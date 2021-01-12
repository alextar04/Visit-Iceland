import unittest
from AttractionsPageTests.testLifehack import TestLifehack
from AttractionsPageTests.testCarousels import TestCarousels
from AttractionsPageTests.testComments import TestComments


class AttractionsPageTests:
    def runTests(self):
        print("Тесты страницы достопримечательностей")
        testClasses = [TestLifehack,
                       TestCarousels,
                       TestComments]

        loader = unittest.TestLoader()
        suitesList = []
        for testClass in testClasses:
            suite = loader.loadTestsFromTestCase(testClass)
            suitesList.append(suite)

        runner = unittest.TextTestRunner(verbosity=2)
        runner.run(unittest.TestSuite(suitesList))


AttractionsPageTests().runTests()
