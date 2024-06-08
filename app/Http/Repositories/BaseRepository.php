<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{

    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function index($filters = null)
    {
    
        $perPage = 5;
        $collection = $this->model;
        foreach ($filters as $field => $value) {
        
           $collection = $collection->orWhere($field, 'LIKE', "%$value%");
        }

        $data = $perPage == -1 ? $collection->get() : $collection->paginate(5);

        return $data;
    }

    public function show($request)
    {

    }

    public function store($request)
    {
        return $this->model->create($request->validated());
    }

    public function update($model, $request)
    {
        $model->update($request->validated());
    }

    public function destroy($model)
    {
        $model->delete();

    }
}