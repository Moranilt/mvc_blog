
<!DOCTYPE html>
<html>
 <head>
  <meta charset="charset=utf-8">
  <title>Rotue users</title>
 </head>
 <body>
  <?php
  if(isset($_SESSION['user_id'])){
    echo 'User lofin - '.$_SESSION['user_login'].'. User id - '.$_SESSION['user_id'];
  }


  echo $this->model->user["id"]." - ".$this->model->user["login"]." - ".$this->model->user["email"];
   ?>


 </body>
</html>
