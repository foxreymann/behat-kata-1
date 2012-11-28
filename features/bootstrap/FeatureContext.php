<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

include '/Users/tomasz/Sites/behat-kata-1/Roman.php';

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    private $input;
    private $output;
    private $roman;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
        $this->roman = new Roman();
    }

     /**
     * @Given /^a decimal number equal to (\d+)$/
     */
    public function aDecimalNumberEqualTo($arg1)
    {
        $this->input = $arg1;
    }

     /**
     * @When /^the roman numeral is generated$/
     */
    public function theRomanNumeralIsGenerated()
    {
        $this->output = $this->roman->convert($this->input);
    }

     /**
     * @Then /^roman numeral should be (\w+)$/
     */
    public function romanNumeralShouldBe($arg1)
    {
        if($this->output != $arg1) {
            throw new Exception('Assert failed.');
        }
    }

//
// Place your definition and hook methods here:
//
//    /**
//     * @Given /^I have done something with "([^"]*)"$/
//     */
//    public function iHaveDoneSomethingWith($argument)
//    {
//        doSomethingWith($argument);
//    }
//
}
