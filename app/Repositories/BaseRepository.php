<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\BaseInterface;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
abstract class BaseRepository implements BaseInterface
{
    /**
     * @var
     */
    protected $model;
    /**
     * @return mixed
     */
    public function getModel()
	{
		return $this->model;
	}

    /**
     * @param Model $model
     * @return $this
     */
    public function setModel($model)
	{
		//$this->model=$model;
		//return $this;
	}
    /**
     * @param array $data
     * @return mixed
     */
    public function addItem(array $data ,$model)
	{
		if ($data)
		{
		    $model->fill($data);
		    $model->save();
		}
		return $model;
	}
    /**
     * @param $itemId
     * @param array $data
     * @param Model $model
     * @return mixed
     */
    public function updateItemById($itemId, array $data ,$model)
	{
		$item=$model->find($itemId);
        if ($data)
        {
            $item->fill($data);
            $item->save();
        }
		return $item;
	}

    /**
     * @param $itemId
     * @param Model $model
     * @return mixed
     */
    public function getItemById($itemId,$model)
	{
		return $model->find($itemId);
	}

    /**
     * @param int $itemId
     * @param Model $model
     * @return mixed
     */
    public function deleteItemById($itemId,$model)
	{
	    $item=$model->find($itemId);
        $item->delete($itemId);
	}
    /**
     * @param Model $model
     * @return mixed
     */
    public function getAllItems($model)
	{
       return $model->all();
	}

    /**
     * @param $per_page
     * @return mixed
     */
    public function paginateItems($model,$per_page)
	{
		return $model->orderBy('created_at','desc')->paginate($per_page);
	}
    /**
     * @param $model
     * @return mixed
     */
    public function countItems($model)
    {
        return count($this->model->all());
    }
}