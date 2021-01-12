from selenium import webdriver
import unittest
import time


# Тестирование действий с комментариями
class TestComments(unittest.TestCase):

    def setUp(self):
        chromePath = "/Users/user/anaconda3/IcelandTravelUITests/chromedriver"
        self.url = "http://192.168.1.33:8080/attractions"
        self.driver = webdriver.Chrome(executable_path=chromePath)
        self.driver.get(self.url)
        time.sleep(1)

    def tearDown(self):
        self.driver.quit()

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
        buttonCloseWindow = driver.find_element_by_xpath("//*[@id=\"exampleModal\"]/div/div/a[2]/div/button[1]")
        buttonCloseWindow.click()
        time.sleep(1)

    # Функция выхода пользователя из системы
    def exitSystem(self):
        driver = self.driver

        userButton = driver.find_element_by_xpath("//*[@id=\"navbarNav\"]/ul[2]/li[7]")
        userButton.click()
        time.sleep(1)
        exitSystemButton = driver.find_element_by_xpath("//*[@id=\"exampleModal\"]/div/div/a[2]/div/button[2]")
        exitSystemButton.click()
        time.sleep(1)

        signInStatus = driver.find_element_by_xpath("//*[@id=\"navbarNav\"]/ul[2]/li[7]/a")
        self.assertEqual(signInStatus.text, "Войти")

    # Функция создания комментария
    def makeComment(self, newAutorLabel, newCommentLabel):
        driver = self.driver

        textArea = driver.find_element_by_xpath("//*[@id=\"exampleFormControlTextarea1\"]").send_keys("Some comment")
        addCommentButton = driver.find_element_by_xpath("//*[@id=\"addButton\"]")
        addCommentButton.click()
        time.sleep(1)
        failLabel = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/div[1]/form/div/div[1]/a")
        self.assertEqual(failLabel.text, "")


    # Тестирование создания комментария без авторизации
    def testFailedMakeComment(self):
        driver = self.driver

        textArea = driver.find_element_by_xpath("//*[@id=\"exampleFormControlTextarea1\"]").send_keys("Some comment")
        addCommentButton = driver.find_element_by_xpath("//*[@id=\"addButton\"]")
        addCommentButton.click()
        time.sleep(1)
        failLabel = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/div[1]/form/div/div[1]/a")
        self.assertEqual(failLabel.text, "Выполните вход в систему")

    # Тестирование удачного создания комментария
    def testSuccessMakeComment(self):
        driver = self.driver

        self.signIn("Alexey", "12345", False)
        self.makeComment("Alexey", "Some comment")
        newAutorLabel = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/div[2]/div/div/h6[1]")
        newCommentLabel = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/div[2]/div/div/a")

        self.assertEqual("Alexey", newAutorLabel.text)
        self.assertEqual("Some comment", newCommentLabel.text)
        self.exitSystem()

    # Тестирование удачного редактирования комментария
    def testSuccessUpdateComment(self):
        driver = self.driver

        self.signIn("Alexey", "12345", False)
        updateButton = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/div[2]/div/div[2]/small/a[1]/button")
        updateButton.click()
        time.sleep(1)
        textArea = driver.find_element_by_xpath("/html/body/div/div/div/div[10]/div[2]/div/div[1]/textarea").send_keys(" (updated)")
        applyButton = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/div[2]/div/div[2]/small/a[2]/button")
        applyButton.click()
        time.sleep(1)
        updatedCommentLabel = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/div[2]/div/div[1]/a")
        self.assertEqual(updatedCommentLabel.text, "Some comment (updated)")
        self.exitSystem()

    # Тестирование удачного удаления комментария
    def testSuccessDeleteComment(self):
        driver = self.driver

        self.signIn("Alexey", "12345", False)
        # Удалим последний комментарий и оценим время текущего последнего комментария
        lastCommentTime = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/div[2]/div/div[1]/h6[2]/small").text
        deleteButton = driver.find_element_by_xpath("//*[@id=\"app\"]/div/div/div[10]/div[2]/div/div[2]/small/a[3]/button")
        deleteButton.click()
        time.sleep(2)
        lastCommentTimeNew = driver.find_element_by_xpath(
            "//*[@id=\"app\"]/div/div/div[10]/div[2]/div/div[1]/h6[2]/small").text
        self.assertNotEqual(lastCommentTime, lastCommentTimeNew)
        self.exitSystem()


