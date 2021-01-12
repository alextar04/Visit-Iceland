from selenium import webdriver
import unittest
import random
import time
import re


# Тестирование универсальной шапки для страниц
class TestHeader(unittest.TestCase):
    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.driver = webdriver.Chrome(executable_path=chromePath)
        self.driver.get("http://192.168.1.33:8080")
        time.sleep(1)

    def tearDown(self):
        self.driver.quit()

    # Загрузка разделов приложения
    def testWorkingChoosingSection(self):
        driver = self.driver

        sectionNamesArray = ["Путеводитель по Исландии", "", "Достопримечательности",
                             "Исландская кухня", "Гайд по транспорту", "Гайд по жилью"]
        for index in range(1, 8):
            if index == 2 or index == 7:
                continue
            loadSectionButton = driver.find_element_by_xpath("//*[@id=\"navbarNav\"]/ul[2]/li[{}]".format(index))
            loadSectionButton.click()
            time.sleep(2)
            self.assertEqual(driver.title, sectionNamesArray[index-1])

    # Загрузка страниц городов Исландии
    def testWorkingChoosingIcelandCity(self):
        driver = self.driver

        cityNamesArray = ["Рейкъявик", "Коупавогюр", "Хабнарфьодюр",
                          "Акюрейри", "Кеблавик"]
        for index in range(1, 6):
            listCitiesButton = driver.find_element_by_xpath("//*[@id=\"navbarNav\"]/ul[2]/li[2]/a")
            listCitiesButton.click()
            time.sleep(1)
            loadCityPageButton = driver.find_element_by_xpath("// *[ @ id = \"navbarNav\"] / ul[2] / li[2] / div / div[{}] / button".format(index))
            loadCityPageButton.click()
            time.sleep(2)
            self.assertEqual(driver.title, cityNamesArray[index - 1])

    # Функция входа пользователя в систему
    def signIn(self, username, password, signUpStatus):
        driver = self.driver
        userButton = driver.find_element_by_xpath("//*[@id=\"navbarNav\"]/ul[2]/li[7]")
        userButton.click()
        time.sleep(1)
        loginText = driver.find_element_by_xpath("//*[@id=\"exampleModal\"]/div/div/div/a/form/div[1]/input") \
            .send_keys(username)
        passwordText = driver.find_element_by_xpath("//*[@id=\"exampleModal\"]/div/div/div/a/form/div[2]/input") \
            .send_keys(password)
        if signUpStatus:
            registerCheckbox = driver.find_element_by_xpath("//*[@id=\"gridCheck1\"]")
            registerCheckbox.click()
            time.sleep(1)
        signInButton = driver.find_element_by_xpath("//*[@id=\"exampleModal\"]/div/div/a[2]/div/button[2]")
        signInButton.click()
        time.sleep(1)

    # Тестирование успешного входа в систему
    def testSuccessSignIn(self):
        driver = self.driver

        self.signIn("Alexey", "12345", False)
        labelSuccessSignIn = driver.find_element_by_xpath("//*[@id=\"exampleModal\"]/div/div/div/a/h5")
        self.assertEqual(labelSuccessSignIn.text, "Вы вошли как: Alexey")

    # Тестирование успешной регистрации
    def testSuccessSignUp(self):
        driver = self.driver

        username = "User{}".format(random.randint(0, 1000))
        self.signIn(username, "12345", True)
        labelSuccessSignIn = driver.find_element_by_xpath("//*[@id=\"exampleModal\"]/div/div/div/a/h5")
        self.assertEqual(labelSuccessSignIn.text, "Вы вошли как: {}".format(username))

    # Тестирование неуспешного входа
    def testFailedSignIn(self):
        driver = self.driver

        self.signIn("RandomUser", "12345", False)
        errorLoginLabel = driver.find_element_by_xpath(
            "// *[ @ id = \"exampleModal\"] / div / div / div / a / form / div[1] / div")
        self.assertEqual(errorLoginLabel.text, "Введены неверные данные")

    # Тестирование неуспешной регистрации
    def testFailedSignUp(self):
        driver = self.driver

        self.signIn("Alexey", "11111", True)
        errorLoginLabel = driver.find_element_by_xpath(
            "// *[ @ id = \"exampleModal\"] / div / div / div / a / form / div[1] / div")
        self.assertEqual(errorLoginLabel.text, "Пользователь с таким логином уже существует!")

    # Тестирование закрытия окна пользователя
    def testCloseUserWindow(self):
        driver = self.driver

        self.signIn("Alexey", "12345", False)
        bodyStatus = driver.find_element_by_xpath("/html/body").get_attribute("outerHTML")
        self.assertEqual((True if re.search(r'class="modal-open"', bodyStatus) else False), True)

        buttonCloseWindow = driver.find_element_by_xpath("//*[@id=\"exampleModal\"]/div/div/a[2]/div/button[1]")
        buttonCloseWindow.click()
        time.sleep(1)

        bodyStatus = driver.find_element_by_xpath("/html/body").get_attribute("outerHTML")
        self.assertEqual((True if re.search(r'class="modal-open"', bodyStatus) else False), False)

    # Тестирование выхода из системы
    def testExitFromSystem(self):
        driver = self.driver

        self.signIn("Alexey", "12345", False)
        exitSystemButton = driver.find_element_by_xpath("//*[@id=\"exampleModal\"]/div/div/a[2]/div/button[2]")
        exitSystemButton.click()
        time.sleep(1)

        signInStatus = driver.find_element_by_xpath("//*[@id=\"navbarNav\"]/ul[2]/li[7]/a")
        self.assertEqual(signInStatus.text, "Войти")



