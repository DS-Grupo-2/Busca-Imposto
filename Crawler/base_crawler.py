import mysql.connector
from mysql.connector import errorcode
import requests
import traceback
from time import sleep

# from Update import Update
class BaseCrawler:
    connection = None
    api_host = ''
    categories = []
    def __init__(self):
        self.api_host = ''
        connection = self.connect()
        categories = self.get_categories_array()
    def connect(self):
        try:
            self.connection = mysql.connector.connect(
                user='', password='',
                host='',
                database='')
            print('connected')
        except mysql.connector.Error as err:
            if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
                print("Something is wrong with your user name or password, please update them in \\base_crawler.py")
                print("Crawler will continue to update without the latest database information...")
            elif err.errno == errorcode.ER_BAD_DB_ERROR:
                print("Database does not exist")
            else:
                print(traceback.format_exc())
                print(err)
    # def insert(self,course):
    #     try:
    #         placeholders = ', '.join(['%s'] * len(course))
    #         columns = ', '.join(course.keys())
    #         sql = "INSERT INTO %s ( %s ) VALUES ( %s )" % ('courses', columns, placeholders)
    #         cursor = self.connection.cursor()
    #         print(sql, list(course.values()))
    #         ue = cursor.execute(sql, list(course.values()))
    #         self.connection.commit()
    #     except Exception as e:
    #         print(str(e))
    #         self.update(course,course['source'])
    #         pass
    #     finally:
    #         cursor.close()
    #         self.connection.close()
    # def update(self,course,source):
    #     try:
    #         cursor = self.connection.cursor()
    #         placeholders = ', '.join(['%s'] * len(course))
            
    #         print(0)
    #         columns = ', '.join(course.keys())
    #         sql = 'UPDATE '+'courses'+' SET {} WHERE source = '.format(', '.join('{}=%s'.format(k) for k in course))+'\''+source+'\''
    #         # sql = "UPDATE %s ( %s ) VALUES ( %s ) WHERE source = %s" % ('courses', columns, placeholders,str(source))
    #         print(sql, list(course.values()))
    #         cursor.execute(sql, list(course.values()))
    #         self.connection.commit()
    #     except Exception as e:
    #         print(str(e))
    #         pass
    #     finally:
    #         cursor.close()
    #         self.connection.close()
    # def insert_subject(self,id, subject_name,):
    #     try:
    #         cursor = self.connection.cursor()
    #         sql = "INSERT INTO subjects ( id, subject ) VALUE ( %s , %s )" 
    #         print(sql)
    #         val = (id,subject_name)
    #         cursor.execute(sql,val)
    #         self.connection.commit()
    #     except Exception as e:
    #         print(str(e))
    #         pass
    #     finally:
    #         cursor.close()
    #         self.connection.close()
    def call_API(self,data):
        header = {"chaset":"utf-8","content-type":"application/json"}
        request = requests.post(self.api_host+'api/crawlers', data=data ,headers=header)
        print("This is my response"+request.text)
        
    def get_categories_array(self):
        self.connect()
        cursor = self.connection.cursor()
        cursor.execute("SELECT id,subject FROM subjects")
        self.categories = cursor.fetchall()
        cursor.close()
    def search_cetegory_id(self, category_name):
        for category in self.categories:
            if category_name in category[1]:
                return category[0]
        else: 
            return self.update_categories(category_name)
            #update the categories table
    def update_categories(self,category_name):
        try:
            self.update_even_in_falure(category_name)
        except:
            print(traceback.format_exc())
            sleep(400)
            try:
                self.update_even_in_falure(category_name)
            except:
                print(traceback.format_exc())
                pass
            pass

    def update_even_in_falure(self, category_name):
        self.connect()
        cursor = self.connection.cursor()
        # INSERT INTO subjects (subject) VALUES ('test');
        sql = "INSERT INTO subjects ( subject ) VALUES ('%s')" % (category_name)
        ue = cursor.execute(sql)
        self.connection.commit()
        subject_id = cursor.lastrowid
        self.categories.append((subject_id,category_name))
        cursor.close()
        return subject_id
        
    def get_params(self,crawler_name):
        try:
            self.connect()
            cursor = self.connection.cursor(dictionary=True,buffered=True)
            sql = "SELECT * from crawler_params where crawler_name = '"+crawler_name+"'" 
            ue = cursor.execute(sql)
            self.connection.commit()
            result = cursor.fetchone()
            cursor.close()
            # print(result)
            return result
        except:
            print("Fatal! "+traceback.format_exc())
            exit()

    def code(self,crawler_name):
        try:
            self.connect()
            cursor = self.connection.cursor(dictionary=True,buffered=True)
            sql = "SELECT code from crawler_params where crawler_name = '"+crawler_name+"'" 
            ue = cursor.execute(sql)
            self.connection.commit()
            result = cursor.fetchone()
            cursor.close()
            f = open(crawler_name+".py", "w" , encoding="utf-8")
            f.write(str(result['code']))
            f.close()
            cursor.close()
        except:
            print("Fatal! "+traceback.format_exc())
            exit()
        # return result['code']

    def validate(self):
        ''

    def save_current_category(self, crawler, category):
        try:
            self.connect()
            cursor = self.connection.cursor(buffered=True)
            # INSERT INTO subjects (subject) VALUES ('test');
            sql = "UPDATE crawler_params SET category_pause = ('%s') WHERE crawler_name = ('%s'); " % (category,crawler)
            ue = cursor.execute(sql)
            self.connection.commit()
            cursor.close()
            print("updated")
        except:
            print(traceback.format_exc())
            pass
        return 1

    def get_current_category(self, crawler):
        try:
            self.connect()
            cursor = self.connection.cursor(buffered=True)
            # INSERT INTO subjects (subject) VALUES ('test');
            sql = "SELECT category_pause FROM crawler_params where crawler_name = ('%s')" % (crawler)
            ue = cursor.execute(sql)
            self.connection.commit()
            category_pause = cursor.fetchone()[0]
            return category_pause
        except Exception as e:
            print(traceback.format_exc())
            pass

    def generate_hash(self):
        ''
    def call_php_api(self):
        ''
