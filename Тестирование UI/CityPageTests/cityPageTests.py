import unittest
from CityPageTests.testLifehackLinks import TestLifehack


class CityPageTests:
    def runTests(self):
        print("Тесты страниц городов")
        testClasses = [TestLifehack]

        loader = unittest.TestLoader()
        suitesList = []
        for testClass in testClasses:
            suite = loader.loadTestsFromTestCase(testClass)
            suitesList.append(suite)

        runner = unittest.TextTestRunner(verbosity=2)
        runner.run(unittest.TestSuite(suitesList))


CityPageTests().runTests()
