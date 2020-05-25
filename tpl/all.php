
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
     <a href="<?php echo setLink('postcreate'); ?>">Create post</a>
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
  /*
    foreach($users as $user){
      echo $user["id"]." - ".$user["firstname"]. " - ". $user["login"]."<br />";
    }*/

    foreach($posts as $post){
      echo "<hr />Author: ".$post['login']." - Date: ".date("d-F-Y G:i", strtotime($post['created_at']))."<br /><a href=".setLink('post', 'getPost', $post['id'])."><h2>".$post['title']."</h2></a><p style='font-size:20px;'>".$post['body']."</p><br />";
      if(isset($_SESSION['user_login'])){
        if($post['user_id'] == $_SESSION['user_id']){?>
      <a href="<?php echo setLink('postdelete', 'deletePost', $post['id']); ?>">Delete post</a>
  <?php }
      }
    }?>
    <ul>
    <?php
    for($i=1; $i <= $pages; $i++){?>
      <a href="?page=<?php echo $i; ?>"><li><?php echo $i; ?></li></a>
    <?php
  }
   ?></ul>

<input type="text" id="fname" name="fname" onkeyup="showHint(this.value)" />
<span id="txtHint"></span>

<script>
function showHint(str){
  if(str.length == 0){
    document.getElementById("txtHint").innerHTML = "";
    return;
  }else{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "index.php?route=user&action=getUser&argument=" + str, true);
    xmlhttp.send();
  }
}
</script>
 </body>
</html>
