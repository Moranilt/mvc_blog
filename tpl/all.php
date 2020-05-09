
<!DOCTYPE html>
<html>
 <head>
  <meta charset="charset=utf-8">
  <title>Rotue all</title>
 </head>
 <body>
   <?php
   if(!isset($_SESSION['user_login'])){

     ?>
     <form action="<?php echo setLink('login', 'login'); ?>" method="post">
       <input type="text" name="login" value="" placeholder="Login" /><br />
       <input type="password" name="password" value="" placeholder="Password" /><br />
       <input type="submit" value="Sign In" />
     </form>
     <?php
   }else{
     echo 'User login - '.$_SESSION['user_login'].'. User id - '.$_SESSION['user_id'];

     ?>
     <a href="<?php echo setLink('logout', 'logout'); ?>">Logout</a>
     <?php
   }
    ?>
  <!--<a href="index.php?page=tpl&criteria=lily&method=searchName">Link</a>-->
  <a href="<?php echo setLink('user', 'getUser', 'morani'); ?>">Link</a>



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
