<?php

namespace Tenovia\Productapi\Model;

class ProductAttributeManagement
{

    protected $_productloader;  
    protected $_productRepository;
    protected $_stockRegistry;

    public function __construct(
          \Magento\Catalog\Model\ProductFactory $_productloader,
          \Magento\Catalog\Model\ProductRepository $productRepository,
          \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry
      ) 
    {
        $this->_productloader = $_productloader;
        $this->_productRepository = $productRepository;
        $this->_stockRegistry = $stockRegistry;
    }

    public function getProductById($id)
    {
        return $this->_productRepository->getById($id);
    }
    
    public function getProductBySku($sku)
    {
        return $this->_productRepository->get($sku);
    }


    /**
     * {@inheritdoc}
     */
    public function getProductAttribute($param)
    {
        // Test api
        return 'hello api GET return the $param ' . $param;
    }

    /**
     * {@inheritdoc}
     */
    public function updatePrice($id,$value)
    {
        /* @var $product Mage\Catalog\Model\Product */
        //$product = $this->_productloader->create()->load($id);
        $product = $this->getProductBySku($id);

        try{
            $product->setPrice($value);//->save();
            $this->_productRepository->save($product);
            return "Product " . $product->getSku(). "'s Price Updated to " . $product->getPrice();
        } catch(\Exception $e){
            //
             return "Exception: ".$e->getMessage();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function updateBatchCode($id,$value)
    {
        // $product = $this->_productloader->create()->load($id);
        $product = $this->getProductBySku($id);
        try{
            $product->setBatchCode($value)->save();
            return "Product " . $product->getSku() . "'s Batch code Updated to " . $product->getBatchCode();
        } catch(\Exception $e){
            //
            return "Exception: ".$e->getMessage();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function updateExpiryDate($id,$value)
    {
        // $product = $this->_productloader->create()->load($id);
        $product = $this->getProductBySku($id);
        try{
            $product->setExpiryDate($value)->save();
            return "Product " . $product->getSku() . "'s Expiry date Updated to " . $product->getExpiryDate();
        } catch(\Exception $e){
            //
            return "Exception: ".$e->getMessage();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function updateQty($id,$value)
    {
        // $product = $this->_productloader->create()->load($id);
        $product = $this->getProductBySku($id);
        try{
            $stockItem = $this->_stockRegistry->getStockItemBySku($id);

            $stockItem->setQty($value);
            $stockItem->setIsInStock((bool)$value);
            $this->_stockRegistry->updateStockItemBySku($id, $stockItem);

            return "Product " . $product->getSku() . "'s Qty Updated to " . $stockItem->getQty();
        } catch(\Exception $e){
            //
            return "Exception: ".$e->getMessage();
        }
    }

}
