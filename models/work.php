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
  public function __construct($id = '',
                              $nom = '',
                              $type = '',
                              $likes= '',
                              $image = '',
                              $article = '') {
    if ($id != ''){
      $this->id = $id;
      $this->load();
    }
    else {
      $this->nom      = $nom;
      $this->groupe   = $groupe;
      $this->type     = $type;
      $this->likes    = $likes;
      $this->image    = $image;
      $this->article  = $article;
    }
  }

  public function load() {
    if (isset($this->id)) {
      $db = Database::getInstance();
      $sql = 'SELECT * FROM works WHERE id="'.$this->id.'"';
      if ($result = $db->fetch($sql)) {
        $this->nom      = $result [0]["nom"];
        $this->groupe   = $result [0]["groupe"];
        $this->type     = $result [0]["type"];
        $this->likes    = $result [0]["likes"];
        $this->image    = $result [0]["image"];
        $this->article  = $result [0]["article"];
      }
    }
  }

  function create() {
    $db = Database::getInstance();
    $sql = 'INSERT INTO works (nom, groupe, type, likes, image, article) VALUES ("'.$this->nom.'", "'.$this->groupe.'", "'.$this->type.'", "'.$this->likes.'", "'.$this->image.'","'.$this->article.'");'
    $db->exec($sql);
  }



}


?>