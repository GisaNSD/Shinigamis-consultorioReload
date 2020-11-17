<?php 
namespace App\Infrastructure\Files;

class Logger {
    
    private $date;
    private $message;
    private $userIP;
    
    public function __construct($date, $message, $userIP){

        $this->date = $date;
        $this->message = $message;
        $this->userIP = $userIP;

    }

    public function getDate(){

        $this->date = date ("d-m-y hour: h:m:s");
        return $this->date;
    }
}











?>