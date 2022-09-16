<?php

  include("./config/db_connect.php");

  $name = $email = $password = "";
  $errors = array("name" => "","email" => "","password" => "");

if(isset($_POST['submit'])){
  // check name
  if(empty($_POST["name"])){
    $errors["name"] =  "An name is required <br ?>";
  } else {
      $name = $_POST['name'];
  }

    // check email
    if(empty($_POST["email"])){
      $errors["email"] =  "An email is required <br ?>";
    } else {
        $email = $_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors["email"] = "Email is not a valid email";
        }
    }
    
    // check password
    if(empty($_POST["password"])){
        $errors["password"] = "An password is required";
    } else {
      $password = $_POST['password'];
    }

    if(array_filter($errors)){
      // echo "There are errors"; 
    }else{

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      $sql = "INSERT INTO `users`(`id`, `name`, `user_name`, `password`, `status`) VALUES ('','$name','$email','$password','0')";

      if(mysqli_query($conn,$sql)){
        header('Location:index.php');
      }else {
        echo "query error: ". mysqli_error($conn);
      }
    }
}
?>

<!DOCTYPE html> 
<html>
  <?php include("./templates/header.php") ?>
  <div class="container h-100">
  <div class=" ">
  <form class="col-12 mt-5" action="./login.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputUser1" class="form-label">Full Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputUser1" aria-describedby="emailHelp" value="<?php echo $name ?>">
    <div id="nameHelp" class="form-text"><?php echo $errors["name"]; ?></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $email ?>">
    <div id="emailHelp" class="form-text"><?php echo $errors["email"]; ?></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo $password ?>">
    <div id="passwordHelp" class="form-text"><?php echo $errors["password"]; ?></div>
  </div>
  <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
  </div>
  <?php include("./templates/footer.php") ?>
</html>