<?php
	/**
	 * Copyright © 2020 Bram Hammer. All rights reserved.
	 * See COPYING.txt for license details.
	 */
	namespace Fullstak\StandardFee\Model\Total;
	
	use Fullstak\StandardFee\Helper\Data;
	
	class Fee extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
	{
		
		protected $quoteValidator = null;
		
		public $fee;
		
		public $feeLabel;
		
		protected $helperData;
		
		public function __construct(
			\Magento\Quote\Model\QuoteValidator $quoteValidator,
			Data $helperData
		) {
			$this->helperData = $helperData;
			$this->quoteValidator = $quoteValidator;
			
			$this->fee = $this->helperData->getGeneralConfig('standard_fee_price');
			$this->feeLabel = $this->helperData->getGeneralConfig('standard_fee_label');
		}
	
		/**
		 * Collect grand total address amount
		 *
		 * @param \Magento\Quote\Model\Quote $quote
		 * @param \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment
		 * @param \Magento\Quote\Model\Quote\Address\Total $total
		 * @return $this
		 */
		public function collect(
			\Magento\Quote\Model\Quote $quote,
			\Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
			\Magento\Quote\Model\Quote\Address\Total $total
		) {
			parent::collect($quote, $shippingAssignment, $total);
			
			if (!count($shippingAssignment->getItems()))
				return $this;
			
			$exist_amount = 0; //$quote->getFee();
			$fee = $this->fee;
			$balance = $fee - $exist_amount;
			
			$total->setTotalAmount('fee', $balance);
			$total->setBaseTotalAmount('fee', $balance);
			
			$total->setFee($balance);
			$total->setBaseFee($balance);
			
			$total->setBaseGrandTotal($total->getBaseGrandTotal() + $balance);
			
			return $this;
		}
		
		protected function clearValues(Address\Total $total) {
			$total->setTotalAmount('subtotal', 0);
			$total->setBaseTotalAmount('subtotal', 0);
			$total->setTotalAmount('tax', 0);
			$total->setBaseTotalAmount('tax', 0);
			$total->setTotalAmount('discount_tax_compensation', 0);
			$total->setBaseTotalAmount('discount_tax_compensation', 0);
			$total->setTotalAmount('shipping_discount_tax_compensation', 0);
			$total->setBaseTotalAmount('shipping_discount_tax_compensation', 0);
			$total->setSubtotalInclTax(0);
			$total->setBaseSubtotalInclTax(0);
		}
		
		/**
		 * Assign subtotal amount and label to address object
		 *
		 * @param \Magento\Quote\Model\Quote $quote
		 * @param Address\Total $total
		 * @return array|null
		 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
		 */
		public function fetch(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Model\Quote\Address\Total $total) {
			return [
				'code' => 'fee',
				'title' => $this->feeLabel,
				'value' => $this->fee
			];
		}
		
		/**
		 * Get Subtotal label
		 *
		 * @return \Magento\Framework\Phrase
		 */
		public function getLabel() {
			return __($this->feeLabel);
		}
	}