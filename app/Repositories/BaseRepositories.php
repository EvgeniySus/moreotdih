<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepositories
 * @package  App\Repositories
 *
 * Выдает наборы данных
 * Не может создавать изменять сущьность
 *
 */


abstract class BaseRepositories
{
    /**
     * @var Model
     *
     */
    protected $model;

    /**
     * BaseRepositories constructor.
     *
     */

    public function __construct(){

        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */

    abstract protected function getModelClass();

    /**
     * @return Model | \Illuminate\Foundation\Application|mixed
     *
     */

    protected function startCondictions()
    {
        return clone $this->model;
    }


}

