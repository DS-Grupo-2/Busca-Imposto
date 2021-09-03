import mysql.connector
from mysql.connector import errorcode
import requests

class Core:
    connection = None
    api_host = ''
    categories = []
    def __init__(self):
        self.api_host = ''
        connection = self.connect() 
        # categories = self.get_categories_array()

    def connect(self):
        try:
            self.connection = mysql.connector.connect(
                user='', password='',
                host='',
                database='')
            print('connected')
        except mysql.connector.Error as err:
            if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
                print("Something is wrong with your user name or password, please update them in \\Updates.py")
                print("Crawler will continue to update without the latest database information...")
            elif err.errno == errorcode.ER_BAD_DB_ERROR:
                print("Database does not exist")
            else:
                print(err)

    def update(self,crawler_name):
        cursor = self.connection.cursor(dictionary=True,buffered=True)
        sql = "SELECT code from crawler_params where crawler_name = '"+crawler_name+"'" 
        ue = cursor.execute(sql)
        self.connection.commit()
        result = cursor.fetchone()
        cursor.close()
        
        f = open(crawler_name+".py", "w" , encoding="utf-8")
        f.write(str(result['code']))
        f.close()

        return result['code']

# print('i am calling this :(')
# core = Core()
# core.update('hotmart')
# core.update('monetizze')
# # core.update('base_crawler')