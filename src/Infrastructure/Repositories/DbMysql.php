<?php

namespace App\Infrastructure\Repositories;

use App\Database;
use App\Domain\Contracts\IDbSelection;
use App\Models\Coder;


class DbMysql implements IDbSelection {

    private $database;
    private $table = "students_db";
    
    public function __construct()
    {
            if (!$this->database) {
            $this->database = new Database();
        }
    }

    public function dbCreate($name, $subject){

        $this->database->mysql->query("INSERT INTO `{$this->table}` (`name`, `subject`) VALUES ($name, $subject);");

    }

    public function coderDelete($id){

        $query = $this->database->mysql->query("DELETE FROM `students_db` WHERE `students_db`.`id` = {$id}");
    }

    public function findById($id)
    {
        $query = $this->database->mysql->query("SELECT * FROM `students_db` WHERE `id` = {$id}");
        $result = $query->fetchAll();

        return new Coder($result[0]["name"], $result[0]["subject"], $result[0]["id"], $result[0]["created_at"]);
    }

};


?>