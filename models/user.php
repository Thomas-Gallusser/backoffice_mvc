<?php

class User {
  private $id;
  private $login;
  private $password;
  private $permission;

  public function __construct() {

  }

  public function __toString() {
    return $this->login;
  }

  static function withData($array) {
    $instance = new self();
    $instance->fill($array);
    return $instance;
  }

  static function withLogin($login) {
    $instance = new self();
    $instance->login = $login;
    $instance->load();
    return $instance;
  }

  static function withId($id) {
    $instance = new self();
    $instance->id = $id;
    $instance->load();
    return $instance;
  }

  public function fill( $array) {
    $this->id       = $array['id'];
    $this->login      = $array['login'];
    $this->password   = $array['password'];
    $this->permission     = $array['permission'];
  }

  public function load() {
    if (isset($this->login)) {
      $db = Database::getInstance();
      $sql = 'SELECT * FROM st_users WHERE login="'.$this->login.'"';
      if ($result = $db->fetch($sql)) {
        $this->fill($result[0]);
      }
    } else if (isset($this->id)) {
      $db = Database::getInstance();
      $sql = 'SELECT * FROM st_users WHERE id="'.$this->id.'"';
      if ($result = $db->fetch($sql)) {
        $this->fill($result[0]);
      }
    }
  }

  public function create() {
    $this->password = hash("sha256","*1m+".$this->password."i59);");

    $db = Database::getInstance();
    $sql = 'INSERT INTO st_users (login, password, permission) VALUES ("'.$this->login.'", "'.$this->password.'", '.$this->permission.');';
    $db->exec($sql);
  }

  static function getAll(){
    $db = Database::getInstance();
    $sql = 'SELECT * FROM st_users';
    $users = array();
    foreach ($db->fetch($sql) as $users) {
      array_push($users, User::withData($users));
    }
    return $users;
  }

  static function getPart($n,$o) {
    $db = Database::getInstance();
    $sql = 'SELECT * FROM st_users ORDER BY id LIMIT '.$n.' OFFSET '.$o.';';
    $users = array();
    foreach($db->fetch($sql) as $user) {
      array_push($users, User::WithData($user));
    }
    return $users;
  }

  static function getCntArticle(){
  $db = Database::getInstance();
  $sql = 'SELECT * FROM st_users';
  $users = $db->fetch($sql);
  return count($users);
  }

  public function delete() {
    if ($this->id) {
      $db = Database::getInstance();
      $sql = 'DELETE FROM st_users WHERE id = "'.$this->id.'"';
      echo $sql;
      return $db->exec($sql);
    }
  }

  public function edit() {
    $db = Database::getInstance();
    $sql = 'UPDATE st_users SET id="'.$this->id.'",login="'.$this->login.'",password="'.$this->password.'",permission='.$this->permission.';';
    $db->exec($sql);
  }

  public function getId() {
    return $this->id;
  }
  public function getLogin() {
    return $this->login;
  }
  public function getPassword() {
    return $this->password;
  }
  public function getPermission() {
    return $this->permission;
  }

}
