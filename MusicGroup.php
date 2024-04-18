<?php
class MusicGroup {
    private $conn;
    private $tablemusicband ='music_band';  //Имя таблицы
    //поля
    public $id_band;
    public $name;
    public $year;
    public $frontman;
    public $imаge;
    public $discription;


    //конструктор для подключения
    public function __construct($db)
    {
        $this->conn=$db;
    }
    // МЕТОДЫ

    //Все записи
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->tablemusicband . " ORDER BY id_band";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // получение данных по ID
    public function readName($id)
    {
        $this->id_band = $id;
        $query = "SELECT * FROM " . $this->tablemusicband . " WHERE id_band = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_band);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return  $row;
    }

    // получение количества записей
    function allRecords(){

        $query = "SELECT COUNT(*) AS kol FROM $this->tablemusicband ";
        $result = $this->conn->query($query)->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

}

