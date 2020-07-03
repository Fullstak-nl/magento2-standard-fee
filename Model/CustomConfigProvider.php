<?php
	/**
	 * Copyright © 2020 Bram Hammer. All rights reserved.
	 * See COPYING.txt for license details.
	 */
	namespace Fullstak\StandardFee\Model;
	
	use Magento\Checkout\Model\ConfigProviderInterface;
	use Fullstak\StandardFee\Helper\Data;
	
	class CustomConfigProvider implements ConfigProviderInterface {
		
		protected $helper;
		
		public function __construct(
			Data $helper
		) {
			$this->helper = $helper;
		}
		
		public function getConfig() {
			$config = [];
			$config['standard_fee_label'] = $this->helper->getLabel();
			
			return $config;
		}
	}