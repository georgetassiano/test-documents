<?php

namespace App\Services;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface BaseServiceInterface {

    public function paginate(array $data) : Paginator;

    public function index() : Collection;

    public function find(Model $model) : Model;

    public function delete(Model $model) : void;

    public function store(array $data): Model;

    public function update(array $data, Model $model) : Model;
}
