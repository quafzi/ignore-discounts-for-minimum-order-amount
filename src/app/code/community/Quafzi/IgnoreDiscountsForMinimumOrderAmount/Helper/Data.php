<?php

/**
 * Quafzi_IgnoreDiscountsForMinimumOrderAmount_Helper_Data
 * 
 * @package Quafzi_IgnoreDiscountsForMinimumOrderAmount
 * @copyright 2015
 * @author Thomas Birke <tbirke@netextreme.de>
 * @license MIT
 */
class Quafzi_IgnoreDiscountsForMinimumOrderAmount_Helper_Data
    extends Mage_Core_Helper_Data
{
    public function validateMinimumOrderAmount(Mage_Sales_Model_Quote $quote)
    {
        $storeId = $quote->getStoreId();
        if (!Mage::getStoreConfigFlag('sales/minimum_order/active', $storeId)) {
            return true;
        }

        $minAmount = Mage::getStoreConfig('sales/minimum_order/amount', $storeId);
        if (1 == Mage::getStoreConfig('sales/minimum_order/validate_after_discount', $storeId)) {
            if ($quote->getSubtotalWithDiscount() < $minAmount) {
                return false;
            }
        } else {
            $total = 0;
            foreach ($quote->getItemsCollection() as $item) {
                $total += $item->getRowTotalInclTax();
            }
            if ($total < $minAmount) {
                return false;
            }
        }
        return true;
    }
}
