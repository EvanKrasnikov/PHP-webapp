Feature: ""

  Scenario: Articles loaded from the database
    Given user is not authorized
    When user is on the main page
    Then array of articles is present
    And article card does not have Edit button
    And article card does not have Delete button