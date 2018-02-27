<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseInterface
 * @package App\Interfaces
 */
interface BaseInterface
{
    /**
     * @param Model $model
     * @return mixed
     */
    public function setModel($model);
    /**
     * @return Model $model
     */
    public function getModel();

    /**
     * Add New Entity
     * @param array $data
     * @param Model $model
     * @return Model
     */
    public function addItem(array $data ,$model);
    /**
     * Update Single Entity By Id
     * @param $itemId
     * @param array $data
     * @param Model $model
     * @return Model Item
     */
    public function updateItemById($itemId, array $data ,$model);

    /**
     * Get Single Entity By id
     * @param $itemId
     * @param model
     * @return Model
     */
    public function getItemById($itemId,$model);
    /**
     * Delete Item By Id
     * @param integer $itemId
     * @param Model $model
     * @return integer
     */
    public function deleteItemById($itemId,$model);
    /**
     * Get All Entities at table
     * @param Model $model
     * @return array $items
     */
    public function getAllItems($model);
    /**
     * @param $per_page
     * @return mixed
     */
    public function paginateItems($model,$per_page);

    public function countItems($model);
}