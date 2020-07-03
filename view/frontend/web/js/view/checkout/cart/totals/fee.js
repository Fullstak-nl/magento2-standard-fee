/**
 * Copyright © 2020 Fullstak. All rights reserved.
 * See COPYING.txt for license details.
 */
define(
	[
		'Fullstak_StandardFee/js/view/checkout/summary/fee'
	],
	function (Component) {
		'use strict';

		return Component.extend({

			/**
			 * @override
			 */
			isDisplayed: function () {
				return true;
			}
		});
	}
);