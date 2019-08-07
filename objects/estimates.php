<?php
class estimates{
 
    // database connection and table name
    private $conn;
    private $table_name = "estimates";
 
    // object properties
    public $from;
    public $to;
    public $time;
    public $property;

     
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}
// create product
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                from=:from, to=:to, time=:time, property=:property";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->from=htmlspecialchars(strip_tags($this->from));
    $this->to=htmlspecialchars(strip_tags($this->to));
    $this->time=htmlspecialchars(strip_tags($this->time));
    $this->property=htmlspecialchars(strip_tags($this->property));
     
    // bind values
    $stmt->bindParam(":from", $this->from);
    $stmt->bindParam(":to", $this->to);
    $stmt->bindParam(":time", $this->time);
    $stmt->bindParam(":property", $this->property);
    
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
    }