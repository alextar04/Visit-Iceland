from selenium import webdriver
import unittest
import time


# Тестирование загрузки разделов лайфхаков
class TestLifehack(unittest.TestCase):

    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.url = "http://192.168.1.33:8080/attractions"
        self.driver = webdriver.Chrome(executable_path=chromePath)
        self.driver.get(self.url)
        time.sleep(1)

    def tearDown(self):
        self.driver.quit()

    # Переходы на подразделы лайфхаков из страницы достопримечательностей
    def testLoadLifehackPages(self):
        driver = self.driver

        lifehacksLinksArray = ["#1a", "#1a", "#2a", "#2a", "#3a", "#3a"]
        for index in range(0, 6):
            lifehack = driver.find_element_by_xpath("// *[ @ id = \"app\"] / div / div / div[{}] / div / div[{}] / div / a"
                                                                   .format(int(index / 3) + 2, (index % 3) + 1))
            lifehack.click()
            time.sleep(1)
            self.assertEqual(driver.current_url, self.url + lifehacksLinksArray[index])
            driver.back()
            time.sleep(1)