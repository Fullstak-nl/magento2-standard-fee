<?php
	/**
	 * Copyright © 2020 Fullstak. All rights reserved.
	 * See COPYING.txt for license details.
	 */
	namespace Fullstak\StandardFee\Block\Sales\Order;
	
	use Fullstak\StandardFee\Model\Total\Fee as FeeModel;
	
	class Fee extends \Magento\Framework\View\Element\Template
	{
		/**
		 * Tax configuration model
		 *
		 * @var \Magento\Tax\Model\Config
		 */
		protected $_config;
		
		/**
		 * @var Order
		 */
		protected $_order;
		
		/**
		 * @var \Magento\Framework\DataObject
		 */
		protected $_source;
		
		/**
		 * @var FeeModel
		 */
		protected $_fee;
		
		/**
		 * @param \Magento\Framework\View\Element\Template\Context $context
		 * @param \Magento\Tax\Model\Config $taxConfig
		 * @param \Fullstak\StandardFee\Model\Total\Fee
		 * @param array $data
		 */
		public function __construct(
			\Magento\Framework\View\Element\Template\Context $context,
			\Magento\Tax\Model\Config $taxConfig,
			FeeModel $feeModel,
			array $data = []
		) {
			$this->_config = $taxConfig;
			$this->_fee = $feeModel;
			parent::__construct($context, $data);
		}
		
		/**
		 * Check if we need display full tax total info
		 *
		 * @return bool
		 */
		public function displayFullSummary()
		{
			return true;
		}
		
		/**
		 * Get data (totals) source model
		 *
		 * @return \Magento\Framework\DataObject
		 */
		public function getSource()
		{
			return $this->_source;
		}
		public function getStore()
		{
			return $this->_order->getStore();
		}
		
		/**
		 * @return Order
		 */
		public function getOrder()
		{
			return $this->_order;
		}
		
		/**
		 * @return array
		 */
		public function getLabelProperties()
		{
			return $this->getParentBlock()->getLabelProperties();
		}
		
		/**
		 * @return array
		 */
		public function getValueProperties()
		{
			return $this->getParentBlock()->getValueProperties();
		}
		
		/**
		 * Initialize all order totals relates with tax
		 *
		 * @return \Magento\Tax\Block\Sales\Order\Tax
		 */
		public function initTotals()
		{
			
			$parent = $this->getParentBlock();
			$this->_order = $parent->getOrder();
			$this->_source = $parent->getSource();
			
			$fee = new \Magento\Framework\DataObject(
				[
					'code' => 'fee',
					'strong' => false,
					'value' => $this->_fee->fee,
					'label' => $this->_fee->getLabel()
				]
			);
			
			$parent->addTotal($fee, 'fee');
			$this->_addTax('grand_total');
			
			return $this;
		}
		
	}
