<?php
namespace DAO;

use DAO\CinemaDAO as CinemaDAO;
use Models\Cinema as Cinema;

class CinemaDAO{


    private $cinemaList = array();
    private $fileName;

    public function __construct()
    {
        $this->fileName = dirname(__DIR__)."/Data/cinemas.json";
    }


    public function GetAll(){
        $this->RetrieveData();
        return $this->cinemaList;
    }


    public function Add($cinema){
        $this->RetrieveData();
        array_push($this->$cinema);
        $this->SaveData();
    }

private function RetrieveData()
    {
     $this->cinemaList = array();

     if(file_exists($this->fileName))
     {
        $jsonContent = file_get_contents($this->fileName);
        $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
        foreach($arrayToDecode as $oneCinema){
            $cinema = new Cinema();
            $cinema->setName($oneCinema["name"]);
            $cinema->setAdress($oneCinema["adress"]);
            $cinema->setOpeningTime($oneCinema["openingTime"]);
            $cinema->setClosingTime($oneCinema["closingTime"]);
            $cinema->setTicketValue($oneCinema["ticketValue"]);
            $cinema->setId($oneCinema["id"]);

            array_push($this->cinemaList, $cinema);
        }
    }
}

public function Remove($cinemaRemove)
{
    $cinemaList = $this->RetrieveData();

    $this->cinemaList = array_filter($this->cinemaList, function($cinema) use($cinemaRemove){
        return $cinema->getName() != $cinemaRemove;
    });

    $this->SaveData($cinemaList);

}

public function SaveData()
{
    $arrayToEncode = array();

    foreach($this->cinemaList as $cinema)
    {
        $valuesArray = array();
        $valuesArray["name"] = $cinema->getName();
        $valuesArray["adress"] = $cinema->getAdress();
        $valuesArray["openingTime"]=$cinema->getOpeningTime();
        $valuesArray["closingTime"]=$cinema->getClosingTime();
        $valuesArray["ticketValue"] = $cinema->getTicketValue();
        $valuesArray["id"]=$cinema->getId();
        array_push($arrayToEncode, $valuesArray);
    }

    $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

    if (file_exists($this->fileName))
        file_put_contents("../data/cinemas.json", $fileContent);
}


public function AddAll($cinemas){
    $this->RetrieveData();
    $this->cinemaList = array_replace($this->cinemaList,$cinemas);
    $this->saveData();

}
}

