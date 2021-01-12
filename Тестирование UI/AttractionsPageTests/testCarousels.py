from selenium import webdriver
import unittest
import time
import re


# Тестирование каруселей страницы достопримечатльностей
class TestCarousels(unittest.TestCase):

    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.url = "http://192.168.1.33:8080/attractions"
        self.driver = webdriver.Chrome(executable_path=chromePath)
        self.driver.get(self.url)
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

    # Работоспособность кнопок каруселей "Влево"-"Вправо"
    def testCarouselsMoving(self):
        driver = self.driver
        
        # Проверка 3 каруселей
        for indexCarousel in range(1, 4):
            # Поиск всех картинок
            picturesArray = []
            for indexPicture in range(1, 3):
                picturesArray.append(
                    driver.find_element_by_xpath("//*[@id=\"carouselExampleControls{}\"]/div/div[{}]".format(indexCarousel, indexPicture)))

            # Проверка кнопки "Вперед"
            carouselNextButton = driver.find_element_by_xpath("//*[@id=\"carouselExampleControls{}\"]/a[2]".format(indexCarousel))
            carouselNextButton.click()
            time.sleep(1)
            indexNextPage = self.getActiveStatusArray(picturesArray).index(True)
            nextPage = driver.find_element_by_xpath(
                "//*[@id=\"carouselExampleControls{}\"]/div/div[{}]".format(indexCarousel, indexNextPage + 1))
            self.assertEqual(picturesArray[indexNextPage].text, nextPage.text)

            # Проверка кнопки "Назад"
            carouselPreviousButton = driver.find_element_by_xpath("//*[@id=\"carouselExampleControls{}\"]/a[1]".format(indexCarousel))
            carouselPreviousButton.click()
            time.sleep(1)
            indexPreviousPage = self.getActiveStatusArray(picturesArray).index(True)
            previousPage = driver.find_element_by_xpath(
                "//*[@id=\"carouselExampleControls{}\"]/div/div[{}]".format(indexCarousel, indexPreviousPage + 1))
            self.assertEqual(picturesArray[indexPreviousPage].text, previousPage.text)