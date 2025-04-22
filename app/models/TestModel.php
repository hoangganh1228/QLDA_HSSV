<?php
class TestModel extends Model{
    
    function them()
    {
        return $this->database->insert('test', ['ten' => 'teser']);
    }
}