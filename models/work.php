<?php

class Work {
  //Déclaration des variables d'après la bcadd
  private $id;
  private $nom;
  private $publication;
  private $author_id;
  private $likes;
  private $image;
  private $article;
  private $nomAuthor;


  //Constructueur
  //*Instanciation d'un object existant avec new Work (id)
  //*Création d'un nouvel objet avec new Work (nom, publication, author_id, likes, image, article)
  public function __construct() {

  }

  static function withData( $array ) {
    $instance = new self();
    $instance->fill($array);
    return $instance;
  }

  static function withId($id) {
    $instance = new self();
    $instance->id = $id;
    $instance->load();
    return $instance;
  }

  public function fill( $array ) {
    $this->id       = $array['id'];
    $this->nom      = $array['nom'];
    $this->publication   = $array['publication'];
    $this->author_id     = $array['author_id'];
    $this->likes    = $array['likes'];
    $this->image    = $array['image'];
    $this->article  = $array['article'];
    $this->nomAuthor  = $array['login'];
  }

  public function load() {
    if (isset($this->id)) {
      $db = Database::getInstance();
      $sql = 'SELECT works.*, users.login FROM works LEFT JOIN users ON users.id = works.author_id WHERE works.id="'.$this->id.'"';
      if ($result = $db->fetch($sql)) {
        $this->fill($result[0]);
      }
    }
  }

  //Accesseurs
  public function getId() {
    return $this->id;
  }

  public function getNom() {
    return $this->nom;
  }

  public function getArticle() {
    return $this->article;
  }

  public function getPublication() {
    return $this->publication;
  }

  public function getAuthor_id() {
    return $this->author_id;
  }

  public function getLikes() {
    return $this->likes;
  }

  public function getImage() {
    return $this->image;
  }

  public function getNomAuthor() {
    return $this->nomAuthor;
  }

  //Création d'une entité dans la base de données
  public function create() {
    $db = Database::getInstance();
    $sql = 'INSERT INTO works (nom, author_id, likes, image, article) VALUES ("'.$this->nom.'", "'.$this->author_id.'", '.$this->likes.', "'.$this->image.'","'.$this->article.'");';
    $db->exec($sql);
  }

  //Modification d'une entité dans la base de données
  public function edit() {
    $db = Database::getInstance();
    $sql = 'UPDATE works SET nom="'.$this->nom.'",author_id='.$this->author_id.',likes='.$this->likes.',image="'.$this->image.'",article="'.$this->article.'" WHERE id='.$this->id.';';
    $db->exec($sql);
  }

  //récupère tous les articles et les renvoie dans un tableau
  static function getAll(){
    $db = Database::getInstance();
    $sql = 'SELECT works.*, users.login FROM works LEFT JOIN users ON users.id = works.author_id';
    $works = array();
    foreach ($db->fetch($sql) as $work) {
      array_push($works, Work::withData($work));
    }
    return $works;
  }

  //Récupère les $n derniers articles et les renvoie
  static function getLast($n) {
    $db = Database::getInstance();
    $sql = 'SELECT works.*, users.login FROM works LEFT JOIN users ON users.id = works.author_id ORDER BY id DESC LIMIT '.$n.';';
    $works = array();
    foreach($db->fetch($sql) as $work) {
      array_push($works, Work::WithData($work));
    }
    return $works;
  }

  //Récupère les $n derniers articles et les renvoie
  static function getPart($n,$o) {
    $db = Database::getInstance();
    $sql = 'SELECT works.*, users.login FROM works LEFT JOIN users ON users.id = works.author_id ORDER BY id LIMIT '.$n.' OFFSET '.$o.';';
    $works = array();
    foreach($db->fetch($sql) as $work) {
      array_push($works, Work::WithData($work));
    }
    return $works;
  }
    //Récupère les $n derniers articles et les renvoie
    static function getPartI($n,$o) {
      $db = Database::getInstance();
      $sql = 'SELECT works.*, users.login FROM works LEFT JOIN users ON users.id = works.author_id ORDER BY id DESC LIMIT '.$n.' OFFSET '.$o.';';
      $works = array();
      foreach($db->fetch($sql) as $work) {
        array_push($works, Work::WithData($work));
      }
      return $works;
    }

  //récupère tous les articles et les renvoie dans un tableau
  static function getCntArticle(){
    $db = Database::getInstance();
    $sql = 'SELECT * FROM works';
    $works = $db->fetch($sql);
    return count($works);
  }

  public function delete() {
    if ($this->id) {
      $db = Database::getInstance();
      $sql = 'DELETE FROM works WHERE id = "'.$this->id.'"';
      return $db->exec($sql);
    }
  }

}

// var_dump(Work::WithId(1));
