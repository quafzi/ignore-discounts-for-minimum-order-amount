<?php

class Quafzi_IgnoreDiscountsForMinimumOrderAmount_Model_Sales_Quote
    extends Mage_Sales_Model_Quote
{
    public function validateMinimumAmount($multishipping = false)
    {
        $storeId = $this->getStoreId();
        $minOrderActive = Mage::getStoreConfigFlag('sales/minimum_order/active', $storeId);
        $minOrderMulti  = Mage::getStoreConfigFlag('sales/minimum_order/multi_address', $storeId);
        $minAmount      = Mage::getStoreConfig('sales/minimum_order/amount', $storeId);

        if (!$minOrderActive) {
            return true;
        }

        $addresses = $this->getAllAddresses();

        if ($multishipping && !$minOrderMulti) {
            $grandTotal = 0;
            foreach ($addresses as $address) {
                /* @var $address Mage_Sales_Model_Quote_Address */
                $grandTotal += $address->getQuote()->collectTotals()->getGrandTotal();
            }
            if ($grandTotal < $minAmount) {
                return false;
            }

        } else {
            foreach ($addresses as $address) {
                /* @var $address Quafzi_IgnoreDiscountsForMinimumOrderAmount_Model_Sales_Quote_Address */
                if (false === $address->validateMinimumAmount()) {
                    return false;
                }
            }
        }
        return true;
    }
}
