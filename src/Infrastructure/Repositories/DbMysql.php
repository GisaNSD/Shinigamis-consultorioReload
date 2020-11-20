<?php

namespace App\Infrastructure\Repositories;

use App\Database;
use App\Domain\Contracts\IDbSelection;


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

};


?>