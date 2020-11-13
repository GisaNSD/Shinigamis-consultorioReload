<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Coder;
use phpDocumentor\Reflection\Location; // QUE ES ESTO?

class ApiCodersController
{

    public function __construct()
    {
        /* if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "create")) {
            $this->create();
            return;
        } */

        if (isset($_GET) && isset($_GET["action"]) && ($_GET["action"] == "store")) {
            $data = $_POST;
            var_dump($data);
            // $this->store($data);
            // return;
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
    }

    public function store(array $request): void
    {
        var_dump($request);
        // $newCoder = new Coder($request["name"], $request["subject"]);
        // $newCoder->save();

        // $lastCoder = Coder::findLastCoder();
        
        // $lastCoder = [
        //     "id" => $lastCoder->getId(),
        //     "name" => $lastCoder->getName(),
        //     "subject" => $lastCoder->getSubject(),
        //     "createAt" => $lastCoder->getCreatedAt()
        // ];
        
        // echo json_encode($lastCoder);
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
    }
    
    public function edit($id)
    {
        $coderToEdit = Coder::findById($id);
        new View("EditCoder", ["coder" => $coderToEdit]);
    }

    public function update(array $request, $id)
    {
        $coderToUpdate = Coder::findById($id);
        $coderToUpdate->rename($request["name"]);
        $coderToUpdate->editSubject($request["subject"]);
        $coderToUpdate->update();

        $this->index();
    }
}
