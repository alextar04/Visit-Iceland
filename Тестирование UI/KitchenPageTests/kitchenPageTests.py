import unittest
from KitchenPageTests.testLifehackLinks import TestLifehack


class KitchenPageTests:
    def runTests(self):
        print("Тесты страницы исландской кухни")
        testClasses = [TestLifehack]

        loader = unittest.TestLoader()
        suitesList = []
        for testClass in testClasses:
            suite = loader.loadTestsFromTestCase(testClass)
            suitesList.append(suite)

        runner = unittest.TextTestRunner(verbosity=2)
        runner.run(unittest.TestSuite(suitesList))


KitchenPageTests().runTests()
