<?php 
namespace App\Infrastructure\Files;

class Logger {
    
    private $date;
    private $message;
    private $userIP;
    
    public function __construct($date = "", $message = "", $userIP = ""){

        $this->date = $date;
        $this->message = $message;
        $this->userIP = $userIP;

    }

    public function getDate(){

        $this->date = date ("d-m-y hour: h:m:s");
        return $this->date;
    }

    public function getMessage($message){

        $this->message = $message;
        return $this-> message;
    }

    public function getUserIP(){

        $this->userIP = $_SERVER['REMOTE_ADDR'];
                return $this-> userIP;
    }

    public function openFile(){

        $path = "src/Infrastructure/Files/logs.log";
        $logfile= fopen($path, "a");

        return $logfile;
    }

    public function writeInFile($message){

        $logFile= $this-> openFile();
        $data= fwrite($logFile, $this->getDate().$message.$this->getUserIP());
        return $data;
        $this->closeFile($logFile);
    }

    public function closeFile($logFile){

        fclose($logFile);
    }
}











?>