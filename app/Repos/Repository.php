<?php

namespace App\Repos;


use Illuminate\Database\Eloquent\Model;

class Repository
{
    protected $model;

    /**
     * Repository constructor.
     *
     * @param $model
     */
    public function __construct( Model $model )
    {
        $this->model = $model;
    }

    /**
     * Get all records
     *
     * @param array $columns
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    /**
     * Get Paginated records
     *
     * @param null $limit
     * @param array $columns
     * @return mixed
     */
    public function paginate($limit = null, $columns = ['*'])
    {
        return $this->model->paginate($limit, $columns);
    }

    /**
     * Find record by id
     *
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * Find record by fields
     *
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->model->where($field, $value)->get($columns);
    }

    /**
     * Find record by where clause
     *
     * @param array $where
     * @param array $columns
     * @return mixed
     */
    public function findWhere(array $where, $columns = ['*'])
    {
        return $this->model->where($where)->select($columns);
    }

    /**
     * Find record by where in clause
     *
     * @param $field
     * @param array $where
     * @param array $columns
     * @return mixed
     */
    public function findWhereIn($field, array $where, $columns = ['*'])
    {
        return $this->model->whereIn($field, $where)->get($columns);
    }

    /**
     * Find record by where not in clause
     *
     * @param $field
     * @param array $where
     * @param array $columns
     * @return mixed
     */
    public function findWhereNotIn($field, array $where, $columns = ['*'])
    {
        return $this->model->whereNotIn($field, $where)->get($columns);
    }

    /**
     * Create a new record
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a record
     *
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $record = $this->find($id);
        return $record->update($attributes);
    }

    /**
     * Delete a record
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Eager load a relation
     *
     * @param mixed $relations
     * @return mixed
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    /**
     * Get current model instance
     *
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set model to work with
     *
     * @param mixed $model
     * @return Repository
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }
}