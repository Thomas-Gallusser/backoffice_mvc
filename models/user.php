<?php

class User {
  private $id;
  private $login;
  private $password;
  private $permission;

  public function __construct() {

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

  public function fill( $array) {
    $this->id       = $array['id'];
    $this->login      = $array['login'];
    $this->password   = $array['password'];
    $this->permission     = $array['permission'];
  }

  public function load() {
    if (isset($this->login)) {
      $db = Database::getInstance();
      $sql = 'SELECT * FROM users WHERE login="'.$this->login.'"';
      if ($result = $db->fetch($sql)) {
        $this->fill($result[0]);
      }
    }
  }

  public function create() {
    $this->password = hash("sha256","*1m+".$this->password."i59);");

    $db = Database::getInstance();
    $sql = 'INSERT INTO users (login, password, permission) VALUES ("'.$this->login.'", "'.$this->password.'", '.$this->permission.');';
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
