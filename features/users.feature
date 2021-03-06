Feature:

  Background:
    Given aircraft_model "B737-800" has a value of 10000

    @javascript
  Scenario: I want to be able to buy an aircraft slot
    Given I am logged in as PILOT
    And I have a saldo of 12500
    And I search for aircraft_model "B737-800"

    When I follow "Buy Aircraft"

    Then I should not see "Not enough Saldo"
    And I should see "Buy"

    When I fill in "aircraft_number" with "452R"
    And I press "Buy"

    Then there should be aircraft "BER452R"
    And I should have a saldo of 2500
    And I should be on "/profile"