<?php
class Dao {
  // CLASS WIDE TOGGLE FOR WHETHER OR NOT TO USE HEROKU CALLS OR NOT
  // SET TO TRUE BEFORE PUSHING TO HEROKU
  const USE_HEROKU = false;
  private $url;
  private $host;
  private $db;
  private $dbparts;
  private $user;
  private $pass;

  function __construct() {
    if (self::USE_HEROKU) {
      $this->url = getenv('JAWSDB_URL');
      $this->dbparts = parse_url($this->url);

      $this->host = $this->dbparts['host'];
      $this->user = $this->dbparts['user'];
      $this->pass = $this->dbparts['pass'];
      $this->db = ltrim($this->dbparts['path'],'/');
    } else {
      $this->host = "localhost";
      $this->db = "nonos_db";
      $this->user = "root";
      $this->pass = "";
    }
  }

  public function getConnection () {
    // PDO call the same for local and heroku db
    try {
      $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function getUserFromName($username) {
    $conn = $this->getConnection();
    return $conn->query("SELECT * FROM users WHERE users.username = $username")->fetchAll(PDO::FETCH_ASSOC);
  }
  //TODO: Sanitize this input from username field
  
    /*$conn = $this->getConnection();
    $saveQuery = "SELECT * FROM users WHERE users.username = :username";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":username", $username);
    $q->execute();
    return $q->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getUserFromID($user_id) {
    $conn = $this->getConnection();
    $saveQuery = "SELECT * FROM users WHERE users.user_id = :user_id";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":user_id", $user_id);
    $q->execute();
    return $q;
  }*/

  public function createUser($username, $password, $admin = "0", $guest = "0") {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO users 
        (username, password, admin, guest) 
        VALUES 
        (:username , :password, :admin, :guest)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":username", $username);
    $q->bindParam(":password", $password);
    $q->bindParam(":admin", $admin);
    $q->bindParam(":guest", $guest);
    $q->execute();
  }

  public function changeUsername($user_id, $newUsername) {
    $conn = $this->getConnection();
    $saveQuery =
        "UPDATE users SET 
        username = :newUsername  
        WHERE  
        users.user_id = :user_id"; 
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":newUsername", $newUsername);
    $q->bindParam(":user_id", $user_id);
    $q->execute();
  }

  public function getComments () {
      $conn = $this->getConnection();
      return $conn->query("SELECT users.username, messages.message, messages.sent_time FROM messages JOIN users ON messages.sender_id = users.user_id")->fetchAll(PDO::FETCH_ASSOC);
  }

  public function saveComment ($comment, $user_id) {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO messages 
        (sender_id, message) 
        VALUES 
        (:sender_id , :message)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":message", $comment);
    $q->bindParam(":sender_id", $user_id);
    $q->execute();
  }
}