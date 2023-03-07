<?php

namespace App\Traits;

trait HasUserCan
{
    public function userCan(string $action, mixed $model = null)
    {
        if (!is_null($model)) {
            $action = app($model)->getTable() . ".$action";
        }

        if (!auth()->user()->can($action))
            return abort(403);
    }
}
