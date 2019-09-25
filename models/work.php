<?php

class Work {
  //Déclaration des variables d'après la bcadd
  private $id;
  private $nom;
  private $groupe;
  private $type;
  private $likes;
  private $image;
  private $article;


  //Constructueur
  //*Instanciation d'un object existant avec new Work (id)
  //*Création d'un nouvel objet avec new Work (nom, groupe, type, likes, image, article)
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
    $this->groupe   = $array['groupe'];
    $this->type     = $array['type'];
    $this->likes    = $array['likes'];
    $this->image    = $array['image'];
    $this->article  = $array['article'];
  }

  public function load() {
    if (isset($this->id)) {
      $db = Database::getInstance();
      $sql = 'SELECT * FROM works WHERE id="'.$this->id.'"';
      if ($result = $db->fetch($sql)) {
        $this->fill($result[0]);
      }
    }
  }

  //Accesseurs
  public function getNom() {
    return $this->nom;
  }

  public function getArticle() {
    return $this->article;
  }

  public function getGroupe() {
    return $this->groupe;
  }

  public function getType() {
    return $this->type;
  }

  public function getLikes() {
    return $this->likes;
  }

  public function getImage() {
    return $this->image;
  }

  //Création d'une entité dans la base de données
  public function create() {
    $db = Database::getInstance();
    $sql = 'INSERT INTO works (nom, groupe, type, likes, image, article) VALUES ("'.$this->nom.'", "'.$this->groupe.'", "'.$this->type.'", "'.$this->likes.'", "'.$this->image.'","'.$this->article.'");';
    $db->exec($sql);
  }

  //récupère tous les articles et les renvoie dans un tableau
  static function getAll(){
    $db = Database::getInstance();
    $sql = 'SELECT * FROM works';
    $works = array();
    foreach ($db->fetch($sql) as $work) {
      array_push($work, Work::withData($work));
    }
    return $works;
  }

  //Récupère les $n derniers articles et les renvoie
  static function getLast($n) {
    $db = Database::getInstance();
    $sql = 'SELECT * FROM works ORDER BY id DESC LIMIT '.$n.';';
    $works = array();
    foreach($db->fetch($sql) as $work) {
      array_push($work, Work::WithData($work));
    }
  }

}

// var_dump(Work::WithId(1));
