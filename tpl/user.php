
<!DOCTYPE html>
<html>
 <head>
  <meta charset="charset=utf-8">
  <title>Rotue users</title>
 </head>
 <body>
  <?php
  echo $this->model->user["id"]." - ".$this->model->user["login"]." - ".$this->model->user["email"];
   ?>


 </body>
</html>
