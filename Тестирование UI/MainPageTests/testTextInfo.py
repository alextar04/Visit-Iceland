from selenium import webdriver
import unittest
import time


# Тестирование информации на главной странице
class TestTextInfo(unittest.TestCase):

    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.driver = webdriver.Chrome(executable_path=chromePath)
        self.driver.get("http://192.168.1.33:8080")
        time.sleep(1)

    def tearDown(self):
        self.driver.quit()

    # Тестирование непустой загрузки информации на главной странице
    def testNotEmptyInforamtion(self):
        driver = self.driver
        description = driver.find_element_by_xpath("// *[ @ id = \"app\"] / div / div / div[6] / div[1] / div / p")
        self.assertNotEqual("", description.text)
