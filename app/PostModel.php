<?php
class PostModel{
  public $db;
  public $posts;

  public function __construct($db){
    $this->db = $db;
  }

  public function allPosts(){
    $result = $this->db->prepare("SELECT * FROM posts JOIN users WHERE author_id=users.id ORDER BY posts.reg_date DESC");
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $this->posts = $result->fetchAll();
    return $this->posts;
  }

  public function show($id){
    $result = $this->db->prepare("SELECT * FROM posts JOIN users ON (posts.author_id = users.id) WHERE posts.author_id='$id'");
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $this->posts = $result->fetchAll();
    return $this->posts;
  }
}

 ?>
