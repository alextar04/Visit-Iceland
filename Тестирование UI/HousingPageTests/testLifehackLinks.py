from selenium import webdriver
import unittest
import time


# Тестирование загрузки разделов лайфхаков страницы вариантов жилья
class TestLifehack(unittest.TestCase):

    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.url = "http://192.168.1.33:8080/housing"
        self.driver = webdriver.Chrome(executable_path=chromePath)
        self.driver.get(self.url)
        time.sleep(1)

    def tearDown(self):
        self.driver.quit()

    # Переходы на разделы лайфхаков из страницы вариантов жилья
    def testLoadLifehackPages(self):
        driver = self.driver

        lifehacksArray = ["#hotel", "#kemping", "#guestHouse"]
        for indexLifehack in range(0, 3):
            lifehack = driver.find_element_by_xpath(
                        "// *[ @ id = \"app\"] / div / div / div[{}] / div / div[{}] / div / a".
                        format(int(indexLifehack / 3) + 3, (indexLifehack % 3) + 1))
            lifehack.click()
            time.sleep(1)
            self.assertEqual(driver.current_url, self.url + lifehacksArray[indexLifehack])
            driver.back()
            time.sleep(1)
