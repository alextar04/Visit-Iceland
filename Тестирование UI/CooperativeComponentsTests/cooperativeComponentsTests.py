import unittest
from CooperativeComponentsTests.testHeader import TestHeader
from CooperativeComponentsTests.testFooter import TestFooter


class CooperativeComponentsTests:
    def runTests(self):
        print("Тесты общих компонентов страниц")
        testClasses = [TestHeader,
                       TestFooter
                       ]

        loader = unittest.TestLoader()
        suitesList = []
        for testClass in testClasses:
            suite = loader.loadTestsFromTestCase(testClass)
            suitesList.append(suite)

        runner = unittest.TextTestRunner(verbosity=2)
        runner.run(unittest.TestSuite(suitesList))


CooperativeComponentsTests().runTests()
