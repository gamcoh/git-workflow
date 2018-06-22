<?php

namespace TDD;

/**
 * @author Gamzer <gam@gmail.com>
 */
class Receipt
{
	/**
	 * @param array $items  Array of items
	 * @param float $coupon Coupon
	 * @return int
	 */
	public function total(array $items=[], $coupon=0.0) {
		$sum = array_sum($items);
		if (!is_null($sum)) {
			return $sum - ($sum * $coupon);
		}
		return $sum;
	}

	/**
	 * @param double $amount the amount of item
	 * @param double $tax    the taxs
	 * @return double
	 */
	public function tax($amount, $tax)
	{ 
		return $amount * $tax;
	}

	/**
	 * @param array $items  osef
	 * @param float $tax    osef
	 * @param float $coupon osef
	 * @return float
	 */
	public function postTaxTotal($items, $tax, $coupon)
	{
		$subtotal = $this->total($items, $coupon);
		return $subtotal + $this->tax($subtotal, $tax);
	}
}
