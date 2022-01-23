<?php

namespace App\Facades;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class ModuleFacade
{
    use AuthorizesRequests;

    /**
     * @var Model
     */
    protected Model $model;

    public function __construct()
    {
        try {
            $this->model = app()->make($this->model());
        } catch (BindingResolutionException $e) {
        }
    }

    /**
     * @return string
     */
    abstract protected function model(): string;

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $ids
     * @return int
     */
    public function destroy($ids): int
    {
        return $this->model->destroy($ids);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return bool
     */
    public function update(Model $model, array $data): bool
    {
        return $model->update($data);
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->model->get();
    }

    /**
     * @param array $relations
     * @return Builder
     */
    public function with(array $relations): Builder
    {
        return $this->model->with($relations);
    }
}
