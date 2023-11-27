<?php
  if(isset($_POST['user_input']) && isset($_POST['search_for']) && isset($_POST['search_for'])){
    
      $user_input = $_POST['user_input'];  
      $search_for = $_POST['search_for'];  
      $replace_with = $_POST['replace_with'];
      $user_input_new = "";
      
      if (!empty($user_input) && !empty($search_for) && !empty($replace_with)) {

        if (strpos($user_input, $search_for) !== false) {
                $user_input_new = str_ireplace($search_for, $replace_with,$user_input);
                $info = '<p class="color2">The replacement has been made.</p>';
            } else {
                $error1 = '<p class="color">Word not found in the input.</p>';
            }
      } else {
          $error2 = '<p class="color">Please fill in all fields</p>';
      }

  }
?>

<style>
   
   .container{
       border: 1px solid #000;
       position:absolute;
       top:50%;
       left:50%;
       transform:translate(-50% ,-50%);
       text-align:center;
       height:400px;
       margin:0px;
   }

   input,textarea{
     border: 1px solid #000;
   }

   input[type="submit"],input[type="reset"]{
     padding:5px 10px;
     background:#ff0000;
     color:#fff;
     margin-bottom:5px;
     opacity:0.7;
     transition:0.5s ease;
     cursor:pointer;
   }

   input[type="submit"]:hover,input[type="reset"]:hover{
    opacity:1;
   }

   textarea{
      width:100%; 
   }   

   .color{
     color:#ff0000;
   }

   .color2{
     color:#209b72;;
   }

    .error{
        height: 45px;
    }

</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH AND REPLACE</title>
</head>
<body>

<form action="index.php" method="POST" class="container">
     <div class="error">
        <?php if(isset($info)){ echo $info;}?>
        <?php if(isset($error1)){ echo $error1;}?>
        <?php if(isset($error2)){ echo $error2;}?>
     </div>
    <textarea name="user_input" id="" cols="30" rows="10"><?php if (!empty($user_input_new)){echo $user_input_new;} ?></textarea><br><br>
    <label for="search_for">Search for:</label><br>
    <input type="text" name="search_for" id="search_for"><br><br>

    <label for="replace_with">Replace with:</label><br>
    <input type="text" name="replace_with" id="replace_with"><br><br>

    <input type="submit" value="Find and Replace">
    <input type="reset" value="Reset">
</form>   

</body>
</html>