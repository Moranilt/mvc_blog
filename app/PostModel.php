<?php
class PostModel{
  public $db;
  public $posts;
  public $data = [];

  public function __construct($db){
    $this->db = $db;
  }

  public function allPosts(){
    $result = $this->db->prepare("SELECT * FROM posts JOIN users WHERE author_id=users.id ORDER BY posts.created_at DESC");
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $this->posts = $result->fetchAll();
    return $this->posts;
  }

  public function show($id){
    $result = $this->db->prepare("SELECT * FROM posts JOIN users ON (posts.author_id = users.id) WHERE posts.id='$id'");
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $this->posts = $result->fetchAll();
    return $this->posts;
  }

  public function store(array $data){
    $stmt = $this->db->prepare("INSERT INTO posts (author_id, title, body) VALUES(:author_id, :title, :body)");
    $stmt->execute([':author_id' => $data['user_id'], ':title' => $data['title'], ':body' => $data['body']]);
    $this->posts = self::show($this->db->lastInsertId());
    return $this->posts;
  }
}

 ?>
