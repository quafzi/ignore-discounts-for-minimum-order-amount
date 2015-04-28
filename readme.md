Quafzi IgnoreDiscountsForMinimumOrderAmount Extension
=====================
Ignore discounts during minimum order amount validation.

Facts
-----
- [extension on GitHub](https://github.com/quafzi/Quafzi_IgnoreDiscountsForMinimumOrderAmount)
- Composer package name ``quafzi/ignore-discounts-for-minimum-order-amount``

Description
-----------
Say your customer wants to buy an item for €10, so the order amount is 10€. If your shop has a
minimum order amount of €10, your customer can proceed to checkout.

If your customer enters a coupon code, the order amount may reduce and checkout
would not be possible. This extension changes that behavior: The order is
possible, since the subtotal satisfies the minimum order amount.

Requirements
------------
- PHP >= 5.3.0
- Mage_Core
- Mage_Sales

Compatibility
-------------
- Magento >= 1.4
- Magento <= 2.0

Installation Instructions
-------------------------
1. Install the extension via Composer with the package name shown above or copy all the files into your document root.
2. Clear the cache.

Uninstallation
--------------
1. Remove all extension files from your Magento installation
2. Clear the cache.

Support
-------
If you have any issues with this extension, open an issue on [GitHub](https://github.com/quafzi/Quafzi_IgnoreDiscountsForMinimumOrderAmount/issues).

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Thomas Birke
[@quafzi](https://twitter.com/quafzi)

Licence
-------
MIT

Copyright
---------
(c) 2015 Thomas Birke
