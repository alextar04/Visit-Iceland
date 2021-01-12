from selenium import webdriver
import unittest
import time


# Тестирование отображения заметок
class TestNotes(unittest.TestCase):

    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.driver = webdriver.Chrome(executable_path=chromePath)
        self.driver.get("http://192.168.1.33:8080")
        time.sleep(1)

    def tearDown(self):
        self.driver.quit()

    # Тестирование непустой загрузки заметок на главной странице
    def testNotEmptyNotesMainPage(self):
        driver = self.driver

        for index in range(0,4):
            note = driver.find_element_by_xpath("// *[ @ id = \"app\"] / div / div / div[9] / div[1] / div[{}] / div / p[{}]"
                                                .format(int(index / 2) + 1, (index % 2) + 1))
            self.assertNotEqual(note, "")
