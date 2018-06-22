<?php

namespace TDD;

/**
 * @author Gamzer <gam@gmail.com>
 */
class Receipt
{
    public function total(array $items=[], $coupon=0.0) {
        $sum = array_sum($items);
        if (!is_null($sum)) {
            return $sum - ($sum * $coupon);
        }
        return $sum;
    }

    public function tax($amount, $tax) { 
        return $amount * $tax;
    }

    public function postTaxTotal($items, $tax, $coupon) {
        $subtotal = $this->total($items, $coupon);
        return $subtotal + $this->tax($subtotal, $tax);
    }
}
