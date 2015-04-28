<?php

/**
 * Quafzi_IgnoreDiscountsForMinimumOrderAmount_Model_Sales_Quote_Address 
 * 
 * @package Quafzi_IgnoreDiscountsForMinimumOrderAmount
 * @copyright 2015
 * @author Thomas Birke <tbirke@netextreme.de>
 * @license MIT
 */
class Quafzi_IgnoreDiscountsForMinimumOrderAmount_Model_Sales_Quote_Address
    extends Mage_Sales_Model_Quote_Address
{
    /**
     * Validate minimum amount
     *
     * @return bool
     */
    public function validateMinimumAmount()
    {
        $storeId = $this->getQuote()->getStoreId();

        $valid = parent::validateMinimumAmount();

        if (1 == Mage::getStoreConfig('sales/minimum_order/validate_after_discount', $storeId)
            || !Mage::getStoreConfigFlag('sales/minimum_order/active', $storeId)
            || $this->getQuote()->getIsVirtual() && $this->getAddressType() == self::TYPE_SHIPPING
            || !$this->getQuote()->getIsVirtual() && $this->getAddressType() != self::TYPE_SHIPPING
        ) {
            return $valid;
        }

        $min = Mage::getStoreConfig('sales/minimum_order/amount', $storeId);

        return ($min <= $this->getBaseSubtotalInclTax());
    }
}
