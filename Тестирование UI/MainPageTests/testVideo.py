from selenium.webdriver.common.keys import Keys
from selenium import webdriver
import unittest
import time
import re


# Тестирование ссылки видео
class TestVideo(unittest.TestCase):

    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.driver = webdriver.Chrome(executable_path=chromePath)
        self.driver.get("http://192.168.1.33:8080")
        time.sleep(1)

    def tearDown(self):
        self.driver.quit()

    # Проверка работоспособности встроенного видео
    def testWorkingVideoLink(self):
        driver = self.driver

        driver.switch_to.frame(driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/iframe"))
        time.sleep(3)
        videoButton = driver.find_element_by_xpath("//button[@class='ytp-large-play-button ytp-button']")
        videoButton.send_keys(Keys.ENTER)
        time.sleep(2)
        videoStatus = driver.find_element_by_xpath("//*[@id=\"movie_player\"]")
        playingStatus = True if re.search(r'playing-mode', videoStatus.get_attribute("outerHTML")) else False
        self.assertEqual(playingStatus, True)

        driver = driver.switch_to.default_content
        time.sleep(1)
        self.assertEqual(playingStatus, True)