<?php

$herokudbname = "heroku_607c4ead21a11f6";

class dbConstruct{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host = 'us-cdbr-east-06.cleardb.net';
        global $herokudbname;
        $this->db =  $herokudbname;
        $this->user = 'b04805fc3016f3';
        $this->password = 'ca4df059';
        $this->charset = 'utf8mb4';
    }

    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}

function ejecutarQuery(string $query, array $inputs = null){
    $db_object = new dbConstruct();
    $qr = $db_object->connect()->prepare($query);
    $qr->execute($inputs);
    return $qr;
}
     

?>