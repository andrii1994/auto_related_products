<?php
class Product_Autorelated_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Default collection size
     */
    const PRODUCTS_COLLECTION_COUNT = 10;

    /**
     * Configuration path
     */
    const XML_PATH_COLLECTION_COUNT = 'catalog/autorelated_group/count';

    public function getCollectionSize()
    {
        $config = (int)Mage::getStoreConfig(self::XML_PATH_COLLECTION_COUNT, Mage::app()->getStore());
        return ($config) ? $config : self::PRODUCTS_COLLECTION_COUNT;
    }
}