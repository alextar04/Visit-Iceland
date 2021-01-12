import unittest
from TripPageTests.testLifehackLinks import TestLifehack


class TripPageTests:
    def runTests(self):
        print("Тесты страницы вариантов передвижения")
        testClasses = [TestLifehack]

        loader = unittest.TestLoader()
        suitesList = []
        for testClass in testClasses:
            suite = loader.loadTestsFromTestCase(testClass)
            suitesList.append(suite)

        runner = unittest.TextTestRunner(verbosity=2)
        runner.run(unittest.TestSuite(suitesList))


TripPageTests().runTests()
