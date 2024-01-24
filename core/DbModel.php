<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function save(){
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = [];
        $statement = self::prepare("INSERT INTO $tableName (firstname, lastname) 
            VALUES(:firstname, :lastname)");
    }

    public static function prepare($sql){
        return Application::$app->db->pdo->prepare($sql);
    }
}