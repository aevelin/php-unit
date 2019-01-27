<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 17.01.2019
 * Time: 16:59
 */

namespace TDD;
class Receipt {
    //Adding coupon parameter
    public function total(array $items = [], $coupon) {
        $sum = array_sum($items);
        //If not null then pass to the coupon
        if (!is_null($coupon)) {
            return $sum - ($sum * $coupon);
        }
        return $sum;
    }

    public function tax($amount, $tax) {
        return ($amount * $tax);
    }
}