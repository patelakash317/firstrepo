<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "webcomputing";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function getConnection(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            $response['status'] = '0';
            $response['message'] = $exception->getMessage();
            return $response;

        } else {
            $response['status'] = '1';
            $response['connection'] = $this->conn;
            return $response;

        }
    }
}
?>