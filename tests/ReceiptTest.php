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
}