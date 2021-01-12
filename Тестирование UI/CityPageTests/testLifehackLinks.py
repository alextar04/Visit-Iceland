from selenium import webdriver
import unittest
import time


# Тестирование загрузки разделов лайфхаков
class TestLifehack(unittest.TestCase):

    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.driver = webdriver.Chrome(executable_path=chromePath)

    def tearDown(self):
        self.driver.quit()

    # Переходы на страницы лайфхаков из страниц каждого города
    def testLoadLifehackPages(self):
        driver = self.driver

        cityArray = ["reykjavik", "kopavogur", "habnarfjodyur",
                     "akureyri", "keflavik"]
        capitalLifehacksArray = ["#history", "#geography", "#climate",
                                 "#interesting", "#buying", "#transport"]
        otherCityLifehacksArray = ["#history", "#interesting", "#recomends"]

        for city in cityArray:
            urlCity = "http://192.168.1.33:8080/" + city
            self.driver.get(urlCity)
            time.sleep(1)

            if city == "reykjavik":
                for indexLifehack in range(0, 6):
                    lifehack = driver.find_element_by_xpath(
                        "// *[ @ id = \"app\"] / div / div / div[2] / div[{}] / div / div[{}] / div / a".
                        format(int(indexLifehack / 3) + 2, (indexLifehack % 3) + 1))
                    lifehack.click()
                    time.sleep(1)
                    self.assertEqual(driver.current_url, urlCity + capitalLifehacksArray[indexLifehack])
                    driver.back()
                    time.sleep(1)
            else:
                for indexLifehack in range(0, 3):
                    lifehack = driver.find_element_by_xpath(
                        "// *[ @ id = \"app\"] / div / div / div[2] / div[{}] / div / div[{}] / div / a".
                        format(int(indexLifehack / 3) + 2, (indexLifehack % 3) + 1))
                    lifehack.click()
                    time.sleep(1)
                    self.assertEqual(driver.current_url, urlCity + otherCityLifehacksArray[indexLifehack])
                    driver.back()
                    time.sleep(1)