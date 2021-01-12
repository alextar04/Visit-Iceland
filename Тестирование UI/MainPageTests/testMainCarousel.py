from selenium import webdriver
import unittest
import time
import re


# Тестирование главной карусели главной страницы
class TestMainCarousel(unittest.TestCase):

    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.driver = webdriver.Chrome(executable_path=chromePath)
        self.driver.get("http://192.168.1.33:8080")
        time.sleep(1)

    def tearDown(self):
        self.driver.quit()

    # Получение информации об активности картинок карусели
    def getActiveStatusArray(self, picturesArray):
        # Статус активности каждой картинки
        statusArray = []
        for picture in picturesArray:
            statusArray.append(
                True if re.search(r'carousel-item active', picture.get_attribute("outerHTML")) else False)
        return statusArray

    # Работоспособность кнопок карусели "Влево"-"Вправо"
    def testCarouselMoving(self):
        driver = self.driver
        # Тест нажатия кнопок влево-вправо для загрузки новой картинки
        # Поиск всех картинок
        picturesArray = []
        for indexPicture in range(1, 4):
            picturesArray.append(
                driver.find_element_by_xpath("//*[@id=\"carouselExampleControls\"]/div/div[{}]".format(indexPicture)))

        # Проверка кнопки "Вперед"
        carouselNextButton = driver.find_element_by_xpath("//*[@id=\"carouselExampleControls\"]/a[2]")
        carouselNextButton.click()
        time.sleep(1)
        indexNextPage = self.getActiveStatusArray(picturesArray).index(True)
        nextPage = driver.find_element_by_xpath(
            "//*[@id=\"carouselExampleControls\"]/div/div[{}]".format(indexNextPage + 1))
        self.assertEqual(picturesArray[indexNextPage].text, nextPage.text)

        # Проверка кнопки "Назад"
        carouselPreviousButton = driver.find_element_by_xpath("//*[@id=\"carouselExampleControls\"]/a[1]")
        carouselPreviousButton.click()
        time.sleep(1)
        indexPreviousPage = self.getActiveStatusArray(picturesArray).index(True)
        previousPage = driver.find_element_by_xpath(
            "//*[@id=\"carouselExampleControls\"]/div/div[{}]".format(indexPreviousPage + 1))
        self.assertEqual(picturesArray[indexPreviousPage].text, previousPage.text)

    # Переходы по новые страницы при нажатии на кнопки "Подробнее"
    def testCarouselRightLinks(self):
        driver = self.driver

        furtherCapital = driver.find_element_by_xpath("//*[@id=\"carouselExampleControls\"]/div/div[1]/div/h1[4]/button")
        furtherCapital.click()
        time.sleep(1)
        self.assertEqual(driver.title, "Рейкъявик")
        driver.back()
        time.sleep(1)

        furtherOpenpool = driver.find_element_by_xpath("//*[@id=\"carouselExampleControls\"]/div/div[2]/div/h1[4]/button")
        carouselNextButton = driver.find_element_by_xpath("//*[@id=\"carouselExampleControls\"]/a[2]")
        carouselNextButton.click()
        time.sleep(1)
        furtherOpenpool.click()
        time.sleep(1)
        self.assertEqual(driver.title, "Достопримечательности")
        driver.back()
        time.sleep(1)

        furtherBeach = driver.find_element_by_xpath("//*[@id=\"carouselExampleControls\"]/div/div[3]/div/h1[4]/button")
        carouselNextButton = driver.find_element_by_xpath("//*[@id=\"carouselExampleControls\"]/a[2]")
        carouselNextButton.click()
        time.sleep(1)
        carouselNextButton.click()
        time.sleep(1)
        furtherBeach.click()
        time.sleep(1)
        self.assertEqual(driver.title, "Достопримечательности")
        driver.back()
        time.sleep(1)