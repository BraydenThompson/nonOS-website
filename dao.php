<?php
class Dao {
    private $host = "localhost";
    private $db = "nonosdb";
    private $user = "bradyt";
    private $pass = "password";

    public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
    }

    public function getComments () {
        $conn = $this->getConnection();
        return $conn->query("SELECT * FROM comments")->fetchAll(PDO::FETCH_ASSOC);
  }
}