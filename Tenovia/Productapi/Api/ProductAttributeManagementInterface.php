<?php

namespace Tenovia\Productapi\Api;

interface ProductAttributeManagementInterface
{


    /**
     * GET for ProductAttribute api
     * @param string $param
     * @return string
     */
    public function getProductAttribute($param);

    /**
     * GET for ProductAttribute api
     * @param string $id
     * @param float $value
     * @return string
     */
    public function updatePrice($id,$value);

    /**
     * GET for ProductAttribute api
     * @param string $id
     * @param string $value
     * @return string
     */
    public function updateBatchCode($id,$value);

    /**
     * GET for ProductAttribute api
     * @param string $id
     * @param string $value
     * @return string
     */
    public function updateExpiryDate($id,$value);

    /**
     * GET for ProductAttribute api
     * @param string $id
     * @param float $value
     * @return string
     */
    public function updateQty($id,$value);
}
