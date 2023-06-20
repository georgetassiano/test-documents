<?php

namespace App\Services;
use Illuminate\Database\Eloquent\Model;

interface CategoryServiceInterface extends BaseServiceInterface
{
    public function getCategoryByName(string $name) : Model;
}
