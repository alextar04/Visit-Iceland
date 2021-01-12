from selenium import webdriver
import unittest
import time


# Тестирование универсального подвала для страниц
class TestFooter(unittest.TestCase):
    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.driver = webdriver.Chrome(executable_path=chromePath)
        self.driver.get("http://192.168.1.33:8080")
        time.sleep(1)

    def tearDown(self):
        self.driver.quit()

    # Тестирование загрузки Facebook
    def testLoadingFacebook(self):
        driver = self.driver

        facebookButton = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/ul/li[1]/a")
        facebookButton.click()
        time.sleep(1)

        self.assertEqual(driver.title, "Donald J. Trump - Главная | Facebook")

    # Тестирование загрузки Twitter
    def testLoadingTwitter(self):
        driver = self.driver

        twitterButton = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/ul/li[2]/a")
        twitterButton.click()
        time.sleep(1)

        self.assertEqual(driver.title, "President Trump (@POTUS) / Twitter")

    # Тестирование загрузки Google+
    def testLoadingGoogle(self):
        driver = self.driver

        googleButton = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/ul/li[3]/a")
        googleButton.click()
        time.sleep(1)

        self.assertEqual(driver.title, "Вход – Google Аккаунты")

    # Тестирование загрузки GitHub
    def testLoadingGithub(self):
        driver = self.driver

        githubButton = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/ul/li[5]/a")
        githubButton.click()
        time.sleep(1)
        self.assertEqual(driver.title, "GitHub - alextar04/WebLabs: Клиент-серверное веб-приложение \"Путеводитель по Исландии\"")
        driver.back()
        time.sleep(1)

        githubButton = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/div/a")
        githubButton.click()
        time.sleep(1)
        self.assertEqual(driver.title, "alextar04 (Alexey Taran) · GitHub")
