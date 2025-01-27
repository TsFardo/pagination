<?php
class DbConnect
{     //  Параметры подключения к БД   
    private $host = "localhost";   private $port = '3306';
    private $dbname = "music";     private $user = "root";           
    private $pass = "";           private $charset = 'utf8';          
    private $options = [    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    private $PDO;   
    public function connect_pdo()  //метод подключения БД
    {
        $this->PDO = NULL;
        try {
            $this->PDO = new PDO("mysql:host=" . $this->host . ";
                            port=" . $this->port . ";  dbname=" . $this->dbname . ";  
                            charset=" . $this->charset,  $this->user, 
                            $this->pass,  $this->options  );
        } catch (PDOException $exception) {
            echo "Ошибка соединения: " . $exception->getMessage();
        }         return $this->PDO;
    }
    public function close_connect()   //метод закрытия подключения БД
    {
        $this->PDO = NULL;
    }  
    public function getInfPDO() //метод возврата PDO для разработчика
    {
        return $this->PDO;
    }
}