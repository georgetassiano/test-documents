<?php

namespace App\Services;

use App\Exceptions\UnauthorizedUserException;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseService implements BaseServiceInterface {

    protected $repository;

    public function __construct(RepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function paginate(array $data) : Paginator
    {
        return $this->repository->paginate($data['limit'] ?? null, $data['columns'] ?? ['*']);
    }

    public function index() : Collection
    {
        return $this->repository->all();
    }

    public function find(Model $model) : Model
    {
        return $this->repository->find($model->id);
    }

    public function delete(Model $model) : void
    {
        $this->repository->delete($model->id);
    }

    public function store(array $data) : Model
    {
        return $this->repository->create($data);
    }

    public function update(array $data, Model $model) : Model
    {
        return $this->repository->update($data, $model->id);
    }
}
