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
        $result = parent::validateMinimumAmount();

        if (0 == Mage::getStoreConfig('sales/minimum_order/validate_after_discount', $this->getStoreId())) {
            if ($this->getGrandTotal()<$amount) {
                $result = false;
            }
        }

        return $result;
    }
}
