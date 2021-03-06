<?php

require_once __DIR__.'/../../../app/config/dbHandler.php';
require_once __DIR__.'/../Entity/user.php';

class UserRepository {
  private $_db;

  public function __construct() {
    $this->_db = dbHandler::getDb();
  }
  
  public function findAll() {
    $results = $this->_db->prepare("SELECT * FROM User");
    $results->execute();

    $users_from_table = $results->fetchAll();
    
    $users = array();
    foreach ($users_from_table as $user) {
      $users[] = new User(
        $user['user_id'],
        $user['user_lname'],
        $user['user_fname'],
        $user['user_pseudo'],
        $user['user_password'],
        $user['user_created'],
      );
    }
    
    return $users;
  }

  public function insertUser() {
    $results = $this->_db->prepare("INSERT INTO user (user_lname, user_fname, user_pseudo, user_password) VALUES ('nom','prenom','pseud','mdp')");
    $results->execute();
  }
}