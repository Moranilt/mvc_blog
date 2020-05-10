
<!DOCTYPE html>
<html>
 <head>
  <meta charset="charset=utf-8">
  <title>Rotue users</title>
 </head>
 <body>
  <?php
  foreach($this->model->posts as $post){
    echo $post['firstname']." - ".$post['title']." - ".$post['body']."<br />";
  }
   ?>


 </body>
</html>
