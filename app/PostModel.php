<?php
class PostModel{
  public $db;
  public $posts;
  public $data = [];

  public function __construct($db){
    $this->db = $db;
  }

  public function allPosts(){
    $count_posts = 4;
    $query = "SELECT * FROM posts JOIN users WHERE author_id=users.user_id ORDER BY posts.created_at DESC";

    $s = $this->db->prepare($query);
    $s->execute();
    $total_results = $s->rowCount();//PDO row count
    $pages = ceil($total_results/$count_posts);
    if(!isset($_GET['page'])){
      $page = 1;
    }else{
      $page = $_GET['page'];
    }
    $starting_limit = ($page - 1)*$count_posts;
    $show = "SELECT * FROM posts JOIN users WHERE author_id=users.user_id ORDER BY posts.created_at DESC LIMIT {$count_posts} OFFSET {$starting_limit}";
    $r = $this->db->prepare($show);
    $r->execute();
    $r->setFetchMode(PDO::FETCH_ASSOC);
    $this->posts = $r->fetchAll();
    $this->posts['pages'] = $pages;
    /*
    $result = $this->db->prepare("SELECT * FROM posts JOIN users WHERE author_id=users.id ORDER BY posts.created_at DESC");
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $this->posts = $result->fetchAll();*/

    return $this->posts;
  }

  public function show($id){
    $result = $this->db->prepare("SELECT * FROM posts JOIN users ON (posts.author_id = users.user_id) WHERE posts.id='$id'");
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

  public function delete($id){
    try{
      $stmt = "DELETE FROM posts WHERE id='$id'";
      $this->db->exec($stmt);
      return true;
    }catch(PDOExeption $e){
      echo $stmt."<br>".$e->getMessage();
    }
    $this->db = null;
  }
}

 ?>
