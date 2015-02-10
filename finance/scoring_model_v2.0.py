#!/usr/bin/python

import logging
import scipy.stats as stats
import numpy
import mysql.connector
from datetime import date, timedelta

from mysql.connector import errorcode
from sklearn.datasets import load_diabetes
from sklearn.datasets import load_svmlight_file
from sklearn import decomposition
from sklearn.linear_model import LogisticRegression
from scipy.sparse import csr_matrix
from scipy.stats import bartlett
from sklearn.tree import DecisionTreeClassifier

# Change DB credentials here
config = {
        'user': 'root',
        'password': 'berocca',
        'host': '127.0.0.1',
        'database': 'bxc',
        'raise_on_warnings': True,
}


# Specify the critical value as 0.05
alpha = 0.05
beta = 0.85

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


class MySQLCursorDict(mysql.connector.cursor.MySQLCursor):
        def _row_to_python(self, rowdata, desc=None):
                row = super(MySQLCursorDict, self)._row_to_python(rowdata, desc)
                if row:
                        return dict(zip(self.column_names, row))
                return None

def get_response():
        try:
                cnx = mysql.connector.connect(**config)
                print("Connect success!!")
                cursor = cnx.cursor(cursor_class=MySQLCursorDict)

                query = ("SELECT * FROM t_loan, t_loan_payment where t_loan.loanID = t_loan_payment.loanID")

                cursor.execute(query)

                rows = cursor.fetchall()

                d = dict()
                for row in rows:
                        # t_loan & t_loan_payment
                        #arr.append(row['loanID'])
                        organization_id = row['organizationID']
                        due_date = row['dueDate']
                        pay_date = row['payDate']

                        if (organisation_id in d):
                                d[organisation_id] &= (pay_date <= due_date)
                        else:
                                d[organisation_id] = (pay_date <= due_date)
                        # print csr_matrix(arrs)
                print d
                cursor.close()
                return d
        except mysql.connector.Error as err:
                if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
                        print("Something is wrong with your user name or password")
                elif err.errno == errorcode.ER_BAD_DB_ERROR:
                        print("Database does not exists")
                else:
                        print(err)
        else:
                cnx.close()

def get_data():
        try:
                cnx = mysql.connector.connect(**config)
                print("Connect success!!")
                #cursor = cnx.cursor()
                cursor = cnx.cursor(cursor_class=MySQLCursorDict)

                query = ("SELECT * FROM t_balance_sheet, t_income_statement where t_balance_sheet.organizationID = t_income_statement.organizationID")

                cursor.execute(query)

                rows = cursor.fetchall()

                d = dict()
                for row in rows:
                        arr = []

                        # t_balance_sheet
                        arr.append(row['grossAssets'])
                        arr.append(row['floatingAssets'])
                        arr.append(row['monetaryCapital'])
                        arr.append(row['liquidInvestment'])
                        arr.append(row['notesReceivables'])
                        arr.append(row['AccountsReceivables'])
                        arr.append(row['suppliersAdvances'])
                        arr.append(row['receivableSubsidies'])
                        arr.append(row['otherReceivables'])
                        arr.append(row['dividendsReceivables'])
                        arr.append(row['stock'])
                        arr.append(row['deferredExpenses'])
                        arr.append(row['otherfloatingAssets'])
                        arr.append(row['nonliquidAssets'])
                        arr.append(row['longequityInvest'])
                        arr.append(row['fixedAssetsTotal'])
                        arr.append(row['fixedAssetsOrigin'])
                        arr.append(row['fixedAssetsNet'])
                        arr.append(row['constructionProcess'])
                        arr.append(row['intangibleAssets'])
                        arr.append(row['longdeferredExpenses'])
                        arr.append(row['othernonliquidInvest'])
                        arr.append(row['grossDebt'])
                        arr.append(row['currentDebt'])
                        arr.append(row['shortLoan'])
                        arr.append(row['notesPayables'])
                        arr.append(row['accountsPayables'])
                        arr.append(row['advanceCustomers'])
                        arr.append(row['taxPayables'])
                        arr.append(row['otherPayables'])
                        arr.append(row['salaries'])
                        arr.append(row['dividendsPayables'])
                        arr.append(row['otherfloatingDebt'])
                        arr.append(row['longLoan'])
                        arr.append(row['othernonfloatingDebt'])
                        arr.append(row['ownerEquity'])
                        arr.append(row['paidinCapital'])
                        arr.append(row['contributedSurplus'])
                        arr.append(row['reservedSurplus'])
                        arr.append(row['undistributedProfit'])
                        arr.append(row['debtownerequityTotal'])
                        arr.append(row['assetliabilityRatio'])
                        arr.append(row['liquidityRatio'])
                        arr.append(row['quickRatio'])

                        # t_income_statement
                        arr.append(row['mainIncome'])
                        arr.append(row['mainCost'])
                        arr.append(row['salesTax'])
                        arr.append(row['mainProfit'])
                        arr.append(row['otherProfit'])
                        arr.append(row['businessCost'])
                        arr.append(row['manageCost'])
                        arr.append(row['financeCost'])
                        arr.append(row['impairmentCost'])
                        arr.append(row['investGain'])
                        arr.append(row['businessProfit'])
                        arr.append(row['otherIncome'])
                        arr.append(row['subsidyIncome'])
                        arr.append(row['otherCost'])
                        arr.append(row['profitTotal'])
                        arr.append(row['incomeTax'])
                        arr.append(row['netProfit'])
                        arr.append(row['grossProfit'])
                        arr.append(row['netMargin'])
                        arr.append(row['grossMargin'])

                        organization_id = row['organizationID']
                        d[organization_id] = arr
                        #       print csr_matrix(arrs)
                print d
                cursor.close()
                return d
        except mysql.connector.Error as err:
                if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
                        print("Something is wrong with your user name or password")
                elif err.errno == errorcode.ER_BAD_DB_ERROR:
                        print("Database does not exists")
                else:
                        print(err)
        else:
                cnx.close()


def get_oscore(floatingAssets, grossAssets, netProfit, dividendsPayables, incomeTax, longequityInvest, grossDebt, mainIncome):
	zscore = 1.2*(floatingAssets/grossAssets) + 1.4*((netProfit-dividendsPayables)/grossAssets) + 3.3*((netProfit+incomeTax)/grossAssets) + 0.6*(longequityInvest/grossDebt) + (mainIncome/grossAssets)
	logger.info('zscore is: %s', zscore)
	if zscore >= 2.675:
		organization_score = 0.8 + 0.04145 * (zscore - 2.675)
	elif zscore >= 1.81:
		organization_score = 0.8 - 0.2595 * (2.675-zscore)
	else:
		organization_score = 0.27 * zscore
	return organization_score



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
	

def is_rejected_normal_distribution(data):
	(c,p) = stats.kstest(data, 'norm')
	if p < alpha:
		logger.info('Reject null hypothesis that given data follows a normal distribution')
		return True
	else:
		logger.info('Cannot reject null hypothesis that given data follows a normal distribution')
		return False


'''
Count the number of components needed to reach a specified threshold.
The threshold is specified as a real value in between 0.0 and 1.0.
'''
def component_count(explained_variance, threshold):
        total = sum(explained_variance)

        n = 0
        s = 0
	# count the number of components needed to reach 80% of explained variance
        for i in explained_variance:
                s += i/total
                n += 1
                if (s > threshold):
                        break
	return n


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
screening features of the training data
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
 logistic regression and decision tree.
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
		return probs[0][0]

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
		return probs[0][0]

def load_data(d1, d2):
	arrs = []
	response = []
	for (k,v) in d1.items():
		if k in d2:
			arrs.append(v)
			if d2[k]:
				response.append(1)
			else:
				response.append(-1)
	
	if len(arrs) == 0:
		return csr_matrix((0,0)), response
	else:
		return (csr_matrix(arrs), response)


def run(X_train, y_train, samples):	
	sample = samples[0]
        sample_size, feature_count = X_train.shape
	print sample_size
	if sample_size < 2:
		return get_oscore(sample[1], sample[0], sample[60], sample[31], sample[59], sample[14], sample[22], sample[44])

	# select the features from original training set
	selected_indices = select_features(X_train, y_train)	
	logger.info('Selected features with indices: %s', selected_indices)

	samples = X_train.tocsr()[[0], :]
	(X_reduced, samples_reduced) = run_pca(X_train, selected_indices, samples)

	# Running logistic regression
	probs_logit = run_logit(X_reduced, y_train, samples_reduced)

	# Running decision tree
	probs_dtree = run_dtree(X_reduced, y_train, samples_reduced)

	# return average between logit and dtree
	return (probs_logit + probs_dtree)/2

'''
Loads intput data, apply feature selection and feature extraction.
'''
def get_score(sample):
	setup_logger()
	logger.info('Start feature selection for given data...')

	# Load dataset
        #X_train, y_train = load_svmlight_file('fake_data.txt')
	d1 = get_data()
	d2 = get_response()
        X_train, y_train = load_data(d1, d2)

	print 'X_train=',X_train
	print 'y_train=',y_train
	# Use first row as query.  Replace this line for customised query.
	# samples = X_train.tocsr()[[0], :]

	return run(X_train, y_train, [sample])

def main():
	sample = [1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0, 1.0]
	score = get_score(sample)
	logger.info('The score is %s:', score)
	
	
if __name__ == "__main__":

        main()

