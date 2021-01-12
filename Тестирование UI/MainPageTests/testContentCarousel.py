from selenium import webdriver
import unittest
import time


# Тестирование контентной карусели главной страницы
class TestContentCarousel(unittest.TestCase):

    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.driver = webdriver.Chrome(executable_path=chromePath)
        self.driver.get("http://192.168.1.33:8080")
        time.sleep(1)

    def tearDown(self):
        self.driver.quit()

    # Проверка, что контентная карусель загрузилась и содержит хотя бы одну
    def testNotEmptyContent(self):
        driver = self.driver
        try:
            carousel = driver.find_element_by_id("carouselExampleControls0")
            firstPicture = driver.find_element_by_xpath("// *[ @ id = \"carouselExampleControls0\"] / div / div[1]")
            self.assertEqual(True, True)
        except Exception:
            self.assertEqual(True, False)