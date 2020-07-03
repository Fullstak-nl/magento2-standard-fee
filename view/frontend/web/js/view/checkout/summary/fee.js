/**
 * Copyright © 2020 Fullstak. All rights reserved.
 * See COPYING.txt for license details.
 */
/*jshint browser:true jquery:true*/
/*global alert*/
define(
	[
		'Magento_Checkout/js/view/summary/abstract-total',
		'Magento_Checkout/js/model/quote',
		'Magento_Catalog/js/price-utils',
		'Magento_Checkout/js/model/totals'
	],
	function (Component, quote, priceUtils, totals) {
		"use strict";
		return Component.extend({
			defaults: {
				isFullTaxSummaryDisplayed: window.checkoutConfig.isFullTaxSummaryDisplayed || false,
				template: 'Fullstak_StandardFee/checkout/summary/fee'
			},
			totals: quote.getTotals(),
			isTaxDisplayedInGrandTotal: window.checkoutConfig.includeTaxInGrandTotal || false,
			isDisplayed: function() {
				return this.isFullMode();
			},
			getValue: function() {
				var price = 0;
				if (this.totals()) {
					price = totals.getSegment('fee').value;
				}
				return this.getFormattedPrice(price);
			},
			getLabel: function() {
				return window.checkoutConfig.standard_fee_label;
			},
			getBaseValue: function() {
				var price = 0;
				if (this.totals()) {
					price = this.totals().base_fee;
				}
				return priceUtils.formatPrice(price, quote.getBasePriceFormat());
			}
		});
	}
);