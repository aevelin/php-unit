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
        if ($coupon > 1.00) {
            throw new BadMethodCallException('Coupon must be less than or equal to 1.00');
        }
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

    //Add new public function
    public function postTaxTotal($items, $tax, $coupon) {
        //Calculate the subtotal
        $subtotal = $this->total($items, $coupon);
        return $subtotal + $this->tax($subtotal, $tax);
    }
}