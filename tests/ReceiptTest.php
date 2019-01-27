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

    /**
     * @dataProvider provideTotal
     */

    //Adding new parameters
    public function testTotal($items, $expected) {
        $coupon = null;
        //Variable items added
        $output = $this->Receipt->total($items, $coupon);
        $this->assertEquals(
            //Replacements with expected variable
            $expected,
            $output,
            "When summing the total should equal {$expected}"
        );
    }

    //Adding provider function
    public function provideTotal() {
        //Returning an array
        return [
            //Testing data provider
            'ints totaling 16' => [[1,2,5,8], 16],
            [[-1,2,5,8], 14],
            [[1,2,8], 11],
        ];
    }

    //Change the name of the method by adding AndCoupon
    public function testTotalAndCoupon() {
        $input = [0,2,5,8];
        $coupon = 0.20;
        $output = $this->Receipt->total($input, $coupon);
        $this->assertEquals(
            12,
            $output,
            'When summing the total should equal 12'
        );
    }

    public function testTotalException() {
        $input = [0,2,5,8];
        $coupon = 1.20;
        //Exception can be tested directly by using PHPUnit method expect
        //exception
        $this->expectException('BadMethodCallException');
        $this->Receipt->total($input, $coupon);
    }

    //Building a mock instance
    public function testPostTaxTotal() {
        //Items array
        $items = [1,2,5,8];
        //Adding tax amount
        $tax = 0.20;
        //Adding coupon value
        $coupon = null;
        //Building a mock PHPUnit
        $Receipt = $this->getMockBuilder('TDD\Receipt')
            //Define the methods that the stub will respond to
            ->setMethods(['tax', 'total'])
            //Return the instance of the mock
            ->getMock();
        //Methods called once
        $Receipt->expects($this->once())
            ->method('total')
            ->with($items, $coupon)
            ->will($this->returnValue(10.00));
        $Receipt->expects($this->once())
            ->method('tax')
            ->with(10.00, $tax)
            ->will($this->returnValue(1.00));
        //Call the method and assert the result that is expected
        $result = $Receipt->postTaxTotal([1,2,5,8], 0.20, null);
        //Add the assert to assert that the result is equal to 11
        $this->assertEquals(11.00, $result);
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