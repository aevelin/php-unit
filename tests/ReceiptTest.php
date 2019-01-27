<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 17.01.2019
 * Time: 17:05
 */

namespace TDD\Test;
require "vendor\autoload.php";

use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase {
    public function setUp() {
        //Adding new instance Receipt class
        $this->Receipt = new Receipt();
    }

    public function tearDown() {
        //To end the process
        unset($this->Receipt);
    }

    public function testTotal() {
        //Array called input
        $input = [0,2,5,8];
        //Method total called out
        $output = $this->Receipt->total($input);
        $this->assertEquals(
            15,
            $output,
            'When summing the total should equal 15'
        );
    }
    public function testTax() {
        $inputAmount = 10.00;
        $taxInput = 0.10;
        $output = $this->Receipt->tax($inputAmount, $taxInput);
        //To make sure the expected and final data are equal
        $this->assertEquals(
            1.00,
            //If real result doesn't equal to the expected result
            $output,
            'The tax calculation should equal 1.00'
        );
    }
}