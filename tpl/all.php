
<!DOCTYPE html>
<html>
 <head>
  <meta charset="charset=utf-8">
  <title>Rotue all</title>
 </head>
 <body>

  <!--<a href="index.php?page=tpl&criteria=lily&method=searchName">Link</a>-->
  <a href="<?php echo setLink('users', 'searchName', 'danil'); ?>">Link</a>
  <?php
    foreach($users as $user){
      echo $user["id"]." - ".$user["firstname"]. " - ". $user["login"]."<br />";
    }

   ?>

 </body>
</html>
