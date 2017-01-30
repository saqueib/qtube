<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Before create method to run for validation
     *
     * @param $request
     */
    public function beforeCreate($request)
    {
        // run the validation
        $this->validate( $request, $this->model->getModel()->getValidationRules());
    }

    /**
     * Before update method to run for validation
     *
     * @param $request
     */
    public function beforeUpdate($request)
    {
        // run the validation
        $this->validate( $request, $this->model->getModel()->getValidationRules(true));
    }

}
