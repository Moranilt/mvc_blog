<!DOCTYPE html>
<html>
 <head>
  <meta charset="charset=utf-8">
  <title>Rotue users</title>
 </head>
 <body>
  <form action="<?php echo setLink('poststore', 'create'); ?>" method="post">
      <input type="text" name="title" placeholder="Title" /><br /><br />
      <textarea name="body" /> </textarea>
      <br />
      <input type="submit" value="Create post" />
  </form>


 </body>
</html>
