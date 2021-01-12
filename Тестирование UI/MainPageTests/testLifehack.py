from selenium import webdriver
import unittest
import time


# Тестирование загрузки страниц лайфхаков
class TestLifehack(unittest.TestCase):

    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.driver = webdriver.Chrome(executable_path=chromePath)
        self.driver.get("http://192.168.1.33:8080")
        time.sleep(1)

    def tearDown(self):
        self.driver.quit()

    # Переходы на страницы лайфхаков из главной
    def testLoadLifehackPages(self):
        driver = self.driver

        lifehacksRequiredNamesArray = ["Рейкъявик", "Достопримечательности", "Исландская кухня",
                                       "Гайд по транспорту", "Гайд по жилью"]
        for index in range(0,5):
            lifehack = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[{}]/div/div[{}]/div/a"
                                                                   .format(int(index / 3) + 3, (index % 3) + 1))
            lifehack.click()
            time.sleep(1)
            self.assertEqual(driver.title, lifehacksRequiredNamesArray[index])
            driver.back()
            time.sleep(1)