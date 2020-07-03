<?php
	/**
	 * Copyright © 2020 Bram Hammer. All rights reserved.
	 * See COPYING.txt for license details.
	 */
	namespace Fullstak\StandardFee\Helper;
	
	use Magento\Framework\App\Helper\AbstractHelper;
	use Magento\Store\Model\ScopeInterface;
	
	class Data extends AbstractHelper
	{
		
		const XML_PATH_STANDARDFEE = 'sales/standard_fee';
		
		public function getConfigValue($field, $storeId = null) {
			return $this->scopeConfig->getValue(
				$field, ScopeInterface::SCOPE_STORE, $storeId
			);
		}
		
		public function getGeneralConfig($code, $storeId = null) {
			
			return $this->getConfigValue(self::XML_PATH_STANDARDFEE .'/'. $code, $storeId);
		}
		
		public function getLabel($storeId = null) {
			
			return $this->getGeneralConfig('standard_fee_label',$storeId);
		}
		
	}