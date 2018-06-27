<?php

namespace TDD\Test;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Receipt;

/**
 * @author gam <gam@gmail.vcom>
 */
class ReceiptTest extends TestCase
{
	/**
	 * @return void
	 */
	public function setUp()
	{
		$this->Receipt = new Receipt();
	}

	/**
	 * @return void
	 */
	public function tearDown()
	{
		unset($this->Receipt);
	}

	/**
	 * @return bool
	 */
	public function testTotal()
	{
		$input = [0, 2, 5, 8];
		$output = $this->Receipt->total($input);
		$this->assertEquals(15, $output, 'When summing the total shoul equals 14');
	}

	/**
	 * @return bool
	 */
	public function testTotalAndCoupon()
	{
		$input = [0, 2, 5, 8];
		$coupon = 0.20;
		$output = $this->Receipt->total($input, $coupon);
		$this->assertEquals(12, $output, 'When summing the total shoul equals 12');
	}

	/**
	 * @return void
	 */
	public function testPostTaxTotal()
	{
		$receipt = $this->getMockBuilder('TDD\Receipt')
			->setMethods(['tax', 'total'])
			->getMock();

		$receipt->method('total')
			->will($this->returnValue(10.00));

		$receipt->method('tax')
			->will($this->returnValue(1.00));
		
		$result = $receipt->postTaxTotal([1, 2, 5, 8], 0.20, null);
		$this->assertEquals(11.00, $result);
	}

	/**
	 * @return void
	 */
	public function testTax()
	{
		$inputAmount = 10.00;
		$taxInput = 0.10;
		$output = $this->Receipt->tax($inputAmount, $taxInput);
		$this->assertEquals(1.00, $output, "The tax calculation should equal 1.00");
	}
}
