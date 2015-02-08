#!/usr/bin/python



import logging
import scipy.stats as stats
import numpy
# from sklearn.datasets import load_diabetes
from sklearn.datasets import load_svmlight_file
from sklearn import decomposition
from sklearn.linear_model import LogisticRegression
from scipy.sparse import csr_matrix
from scipy.stats import bartlett
from sklearn.tree import DecisionTreeClassifier

alpha = 0.05
beta = 0.95
# the value of beta should be set by a separate function
# that determines factor analysis applicability
# but we do it arbitrarily here until we see the database

'''
Create a logger and set log file as 'out.log'.
'''
def setup_logger():
	logfilename = 'out.log'

	# Set default log level to INFO
	logging.basicConfig(level = logging.INFO)
	global logger
	logger = logging.getLogger()
	handler = logging.FileHandler(filename = logfilename)
	logger.addHandler(handler)

'''
Split the training set into those with a positive response and
those with a negative response based on the response
'''
def getcolbyresponse(X_train, y_train, col):
	(y_length, x_length) = X_train.shape
	
	colpos = []
	colneg = []
	for i in range(y_length):
		if y_train[i] > 0:
        		colpos.append(X_train[i,col])
		if y_train[i] < 0:
        		colneg.append(X_train[i,col])
	return (colpos,colneg)


'''
Fetch the specified column from the training set
'''
def getcol(matrix, col_index):
	(y_length, x_length) = matrix.shape
	col = []
	for i in range(y_length):
        	col.append(matrix[i,col_index])
	return col
	

'''
Perform a one-sample Kolmogorov-Smirnov test on the training set.

If the p-value is below a specified threshold then the null hypthesis
is rejected.
'''
def is_rejected_normal_distribution(data):
	(c,p) = stats.kstest(data, 'norm')
	if p < alpha:
		logger.info('Reject null hypothesis about the data distribution')
		return True
	else:
		logger.info('Cannot reject null hypothesis about the data distribution')
		return False


'''
Count the number of components needed to reach a specified threshold.
The threshold is specified as a real value in between 0.0 and 1.0.
'''
def component_count(explained_variance, threshold):
        total = sum(explained_variance)

        n = 0
        s = 0

        for i in explained_variance:
                s += i/total
                n += 1
                if (s > threshold):
                        break
	return n


'''
Select features from the training set based on a series of statistical tests.
Here Mann-Whitney U Test and the two-sample t-test are applied to training sets
according to the sample's distribution
'''

def is_feature_selected(col, colpos, colneg):
 	is_rejected = is_rejected_normal_distribution(col)

	# select between two statistical tests
	if is_rejected:
		(u, p_value) = stats.mannwhitneyu(colpos,colneg)
		logger.info('Completed Mann-Whitney U test: statistics=%s; p-value=%s' % (u, p_value))
	else:
		(t, p_value) = stats.ttest_ind(colpos,colneg)
		logger.info('Completed two-sample t-test: statistics=%s; p-value=%s' % (u, p_value))

	# Use statistics and p-value to reject null hypothesis
	if (p_value < alpha):
		logger.info('Reject null hypothesis that the two groups have the same mean')
		return True
	else:
		logger.info('Connot Reject null hypothesis that the two groups have the same mean')
		return False


'''
Get indices of the selected features
'''
def select_features(X_train, y_train):
        sample_size,feature_count = X_train.shape

	selected_features = []
        for i in range(feature_count):
                col = getcol(X_train, i)
                (colpos,colneg) = getcolbyresponse(X_train, y_train, i)

		is_selected = is_feature_selected(col, colpos, colneg)
		logger.info('Analysing feature with index %s:' % i)
		if is_selected:
			selected_features.append(i)

	return selected_features


'''
feature extraction on the selected features of the training data.

What we temporarily omit here was KMO test and Bartlett ball test
that could have autmatically judge a threshold as the means of the 
explained variance to decide how many components we need for transform.
'''

def run_pca(X_train, selected_indices, samples):
	# select only useful features 
        X_selected = X_train.tocsr()[:,selected_indices]
	samples_selected = samples.tocsr()[:,selected_indices]

	# run pca for feature extraction
        pca = decomposition.PCA()
        pca.fit(X_train.toarray())

	# determine the number of components needed by looking at explained variance
        pca.n_components = component_count(pca.explained_variance_, beta);

	# transform the data and query
	logger.info('pca.n_components: %s', pca.n_components)
        X_reduced = pca.fit_transform(X_selected.toarray())
        samples_reduced = pca.transform(samples_selected.toarray())

	return (X_reduced, samples_reduced)	



'''
low level learning module
'''

def run_logit(X_reduced, y_train, samples_reduced):
	# create logistic model
        model = LogisticRegression()
        model = model.fit(X_reduced, y_train)
        score = model.score(X_reduced, y_train)
	logger.info('Logistic regression: score=%s' % (score))

	for sample in samples_reduced:
        	predicted_value = model.predict(sample)
        	probs = model.predict_proba(sample)

		logger.info('Logistic regression: predicted_value=%s; probability=%s' % (predicted_value, probs))

'''
Generate a decision tree on the training data
'''

def run_dtree(X, y, samples):
	# create decision tree model
	model = DecisionTreeClassifier(random_state=0)
	model = model.fit(X, y)
	score = model.score(X, y)
	logger.info('Decision tree: score=%s' % (score))

        for sample in samples:
                predicted_value = model.predict(sample)
                probs = model.predict_proba(sample)

		logger.info('Decision tree: predicted_value=%s; probability=%s' % (predicted_value, probs))


'''
This is a simplified version of our core algorithm, for test only
'''

def run(X_train, y_train, samples):	
        sample_size, feature_count = X_train.shape

	# select the features from original training set
	selected_indices = select_features(X_train, y_train)	
	logger.info('Selected features with indices: %s', selected_indices)

	samples = X_train.tocsr()[[0], :]
	(X_reduced, samples_reduced) = run_pca(X_train, selected_indices, samples)

	# Running logistic regression
	run_logit(X_reduced, y_train, samples_reduced)

	# Running decision tree
	run_dtree(X_reduced, y_train, samples_reduced)


'''
Loads intput data, apply feature selection and feature extraction.
Then logistic regression to create a model and predict binary 
outcome based using the model and the query.
'''

def main():
	setup_logger()
	logger.info('Start feature selection for given data...')

	# Load dataset
    
	# we assume a file of training data in a particular format where
    # the first column is outcome of each loan (+1 and -1) and the
    # rest of the columns are real-valued indicators input by the
    # company via the frontend forms
    # - this assumption does not necessarily hold once we see the database.
    
        X_train, y_train = load_svmlight_file('fake_data.txt')
        
    # for quick test run, use diabetes.txt for example as a substitute,
    # and uncomment "from sklearn.datasets import load_diabetes"

	# Use first row as query.  Replace this line for customised query.
    
	samples = X_train.tocsr()[[0], :]

	run(X_train, y_train, samples)

	
if __name__ == "__main__":

        main()


'''
The following is only for testing the call of function get_score(), until v2.0 released.
'''
def get_score():
    retun 77





