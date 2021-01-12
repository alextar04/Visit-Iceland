import unittest
from HousingPageTests.testLifehackLinks import TestLifehack


class HousingPageTests:
    def runTests(self):
        print("Тесты страницы вариантов проживания")
        testClasses = [TestLifehack]

        loader = unittest.TestLoader()
        suitesList = []
        for testClass in testClasses:
            suite = loader.loadTestsFromTestCase(testClass)
            suitesList.append(suite)

        runner = unittest.TextTestRunner(verbosity=2)
        runner.run(unittest.TestSuite(suitesList))


HousingPageTests().runTests()
