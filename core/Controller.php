<?php
 class Controller{
    //goi model
    function model($model) {
        // Đường dẫn tới file model
        $modelPath = 'app/models/' . $model . '.php';
    
        // Kiểm tra file tồn tại
        if (file_exists($modelPath)) {
            require_once $modelPath;
    
            // Lấy tên class từ tên file
            $modelClass = basename($model); // Lấy phần cuối cùng sau dấu `/`
            if (class_exists($modelClass)) {
                return new $modelClass();
            }
        }
    
        return false; // Nếu không tồn tại
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