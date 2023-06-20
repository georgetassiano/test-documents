<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends BaseService implements CategoryServiceInterface
{
    public function __construct(CategoryRepository $repository)
    {
        parent::__construct($repository);
    }


    public function getCategoryByName(string $name) : Model
    {
        return $this->repository->findWhere(['name' => $name], $columns=['id'])->first();
    }
}
