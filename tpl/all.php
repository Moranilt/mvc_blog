
<!DOCTYPE html>
<html>
 <head>
  <meta charset="charset=utf-8">
  <title>Rotue all</title>
 </head>
 <body>

  <!--<a href="index.php?page=tpl&criteria=lily&method=searchName">Link</a>-->
  <a href="<?php echo setLink('user', 'getUser', '1'); ?>">Link</a>

  <form action="<?php echo setLink('newuser', 'newUser'); ?>" method="post">
    <input type="text" name="firstname" value="" placeholder="firstname" /><br />
    <input type="text" name="lastname" value="" placeholder="Lastname" /><br />
    <input type="text" name="login" value="" placeholder="login" /><br />
    <input type="rmail" name="email" value="" placeholder="Email" /><br />
    <input type="password" name="password" value="" placeholder="password" /><br />
    <input type="submit" value="SEND" />
  </form>
  <?php
    foreach($users as $user){
      echo $user["id"]." - ".$user["firstname"]. " - ". $user["login"]."<br />";
    }

   ?>

 </body>
</html>
