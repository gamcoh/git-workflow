<?php

namespace TDD;

/**
 * @author Gamzer <gam@gmail.com>
 */
class Receipt
{
	/**
	 * @param array $items  The items
	 * @param float $coupon The coupon 
	 * @return float
	 */
	public function total(array $items=[], $coupon=0.0)
	{
		$sum = array_sum($items);
		if (!is_null($sum)) {
			return $sum - ($sum * $coupon);
		}
		return $sum;
	}

	/**
	 * @param float $amount The amount
	 * @param float $tax    The tax
	 * @return float
	 */
	public function tax($amount, $tax)
	{
		return $amount * $tax;
	}

	/**
	 * @param array $items  The items
	 * @param float $tax    The tax
	 * @param float $coupon The coupon
	 * @return float
	 */
	public function postTaxTotal($items, $tax, $coupon)
	{
		$subtotal = $this->total($items, $coupon);
		return $subtotal + $this->tax($subtotal, $tax);
	}
}
