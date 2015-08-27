<?php

/**
 * Quafzi_IgnoreDiscountsForMinimumOrderAmount_Model_Sales_Quote_Address 
 * 
 * @package Quafzi_IgnoreDiscountsForMinimumOrderAmount
 * @copyright 2015
 * @author Thomas Birke <tbirke@netextreme.de>
 * @license MIT
 */

if (false === class_exists('Dhl_Account_Model_Quote_Address')) {
    class Dhl_Account_Model_Quote_Address extends Mage_Sales_Model_Quote_Address {}
}

class Quafzi_IgnoreDiscountsForMinimumOrderAmount_Model_Sales_Quote_Address
    extends Dhl_Account_Model_Quote_Address
{
    /**
     * Validate minimum amount
     *
     * @return bool
     */
    public function validateMinimumAmount()
    {
        if ($this->getQuote()->getIsVirtual() && $this->getAddressType() == self::TYPE_SHIPPING) {
            return true;
        } elseif (!$this->getQuote()->getIsVirtual() && $this->getAddressType() != self::TYPE_SHIPPING) {
            return true;
        }
        return Mage::helper('quafzi_ignorediscountsforminimumorderamount/data')
            ->validateMinimumOrderAmount($this->getQuote());
    }
}
