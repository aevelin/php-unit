<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 17.01.2019
 * Time: 16:59
 */

namespace TDD;
class Receipt {
    public function total(array $items = []) {
        return array_sum($items);
    }
}