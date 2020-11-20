<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Coder;
use phpDocumentor\Reflection\Location;
use App\Domain\Contracts\IWriteInFiles;
use App\Infrastructure\Files\Logger;

class ApiCodersController implements IWriteInFiles
{

    public function __construct()
    {
        /* if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "create")) {
            $this->create();
            return;
        } */

        if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "store")) {
            $data = $_POST;
            $this->store($data);
            return;
        }

        if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "edit")) {
            $this->edit($_GET["id"]);
            return;
        }
        
        if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "update")) {
            $this->update($_POST, $_GET["id"]);
            return;
        }

        if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "delete")) {

            $this->delete($_GET["id"]);
            return;
        }

        $this->index();
       
    }

    public function index(): void
    {
        $codersList = Coder::all();
                
        $newCodersList =[];

        foreach ($codersList as $coder) {
                
            $newEntry = [

            "id"=>$coder->getId(), 
            "name"=>$coder->getName(), 
            "subject"=>$coder->getSubject(),
            "created"=>$coder->getCreatedAt()
            ]; 
            array_push($newCodersList, $newEntry);
        }
        
        echo json_encode($newCodersList);

        $this->WriteInFiles("Listando Coders");
        

    }

   public function create(): void
    {
        new View("CreateCoder");
    }

    public function store(array $request): void
    {
         $newCoder = new Coder($request["name"], $request["subject"]);
         $newCoder->save();

         $lastCoder = Coder::findLastCoder();
        
         $lastCoder = [
             "id" => $lastCoder->getId(),
             "name" => $lastCoder->getName(),
             "subject" => $lastCoder->getSubject(),
             "createAt" => $lastCoder->getCreatedAt()
         ];
        
         echo json_encode($lastCoder);

         $this->WriteInFiles("Coder Guardado: " . $lastCoder["name"]);
    }

    public function delete($id)
    {
        $coderToDelete = Coder::findById($id);

        $coderDeleted =  [
            "id" => $coderToDelete->getId(),
            "name" => $coderToDelete->getName(),
            "subject" => $coderToDelete->getSubject(),
            "createat" => $coderToDelete->getCreatedAt()
        ];
        
        echo json_encode($coderDeleted);

        $coderToDelete->delete();

        $this->WriteInFiles("Coder borrado: " . $id);
    }
    
    public function edit($id)
    {
        
        $coderToEdit = Coder::findById($id);

        $coderArrayToEdit = [
            "id"=>$coderToEdit->getId(),
            "name"=>$coderToEdit->getName(),
            "subject"=>$coderToEdit->getSubject(),
            "createdat"=> $coderToEdit->getCreatedAt()
        ];
        
       //new View("EditCoder", ["coder" => $coderToEdit]);
        echo json_encode($coderArrayToEdit);

        $this->WriteInFiles("Coder Editado: " . $id);
    }

    public function update(array $request, $id)
    {   
        $coderToUpdate = Coder::findById($id);
        var_dump($coderToUpdate->getName());
        
        $coderToUpdate->rename($request["name"]);
        $coderToUpdate->editSubject($request["subject"]);
        $coderToUpdate->update();

        $this->WriteInFiles("Coder actualizado: " . $id);
        
        
    }

    public function WriteInFiles($message){

        $logger= new Logger();
        $logger->writeInFile($message);

    }

}