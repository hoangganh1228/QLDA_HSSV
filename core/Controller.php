<?php
 class Controller{
    //goi model
    function model($model){
        if (file_exists('app/models/' . $model . '.php'))
        {
            require_once 'app/models/' . $model . '.php';
            if (class_exists($model))
            {
                $model = new $model();
                return $model;
            }
        }
        return false;
    }

    //goi view
    function view($view, $data)
    {
        if (!empty($data)) extract($data);
        if (file_exists('app/views/' . $view . '.php'))
        {
            require_once 'app/views/' . $view . '.php';
        }
    }
}