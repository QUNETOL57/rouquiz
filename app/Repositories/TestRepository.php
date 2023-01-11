<?php

namespace App\Repositories;

use App\Models\Test;

class TestRepository
{
    public function findAll()
    {
        return Test::query()->get();
    }

}
