<?php

class Product_Autorelated_Block_Autorelated extends Mage_Catalog_Block_Product_View
{

    /**
     * @return null
     */
    public function getRelatedCollection()
    {
        $collection = array();
        /** @var Product_Autorelated_Helper_Data $helper */
        $helper = $this->helper('product_autorelated');

        $category = $this->_getProductCategory();
        if (empty($category)) {
            return $collection;
        }

        $storeId = Mage::app()->getStore()->getId();
        $collection = Mage::getResourceModel('catalog/product_collection')
            ->addAttributeToSelect('*')
            ->setStoreId($storeId)
            ->addFieldToFilter('entity_id', array('nin' => array($this->getProduct()->getId()))) // exclude currently viewed product from collection
            ->addCategoryFilter($category);


        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($collection);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($collection);
        Mage::getSingleton('cataloginventory/stock')->addInStockFilterToCollection($collection);

        $collection->getSelect()->order(new Zend_Db_Expr('RAND()'));
        $collection->setPageSize($helper->getCollectionSize())->setCurPage(1);

        return $collection;
    }

    /**
     * @return mixed
     */
    protected function _getProductCategory()
    {
        $product = $this->getProduct();
        $storeId = Mage::app()->getStore()->getId();

        $categories = Mage::getModel('catalog/category')->getCollection()
            ->setStoreId($storeId)
            ->addAttributeToFilter('is_active', 1)
            ->addFieldToFilter('entity_id', array('in' => $product->getCategoryIds()))
            ->addAttributeToSelect('*');

        return $categories->getLastItem();
    }
}