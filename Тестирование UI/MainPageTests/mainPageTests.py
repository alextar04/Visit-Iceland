import unittest
from MainPageTests.testMainCarousel import TestMainCarousel
from MainPageTests.testLifehack import TestLifehack
from MainPageTests.testTextInfo import TestTextInfo
from MainPageTests.testContentCarousel import TestContentCarousel
from MainPageTests.testVideo import TestVideo
from MainPageTests.testNotes import TestNotes


class MainPageTests:
    def runTests(self):
        print("Тесты главной страницы")
        testClasses = [TestMainCarousel,
                       TestLifehack,
                       TestTextInfo,
                       TestContentCarousel,
                       TestVideo,
                       TestNotes
                       ]

        loader = unittest.TestLoader()
        suitesList = []
        for testClass in testClasses:
            suite = loader.loadTestsFromTestCase(testClass)
            suitesList.append(suite)

        runner = unittest.TextTestRunner(verbosity=2)
        runner.run(unittest.TestSuite(suitesList))


MainPageTests().runTests()
