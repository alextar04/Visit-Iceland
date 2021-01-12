import unittest
from CooperativeComponentsTests.cooperativeComponentsTests import CooperativeComponentsTests
from MainPageTests.mainPageTests import MainPageTests
from AttractionsPageTests.attractionsPageTests import AttractionsPageTests
from CityPageTests.cityPageTests import CityPageTests
from KitchenPageTests.kitchenPageTests import KitchenPageTests
from TripPageTests.tripPageTests import TripPageTests
from HousingPageTests.housingPageTests import HousingPageTests


def runTests():
    CooperativeComponentsTests().runTests()
    MainPageTests().runTests()
    AttractionsPageTests().runTests()
    CityPageTests().runTests()
    KitchenPageTests().runTests()
    TripPageTests().runTests()
    HousingPageTests().runTests()


if __name__ == '__main__':
    runTests()