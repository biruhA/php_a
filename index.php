<?php

  include("./config/db_connect.php");

  //write query
  $sql = "SELECT * FROM users";

  //make query & get result
  $result = mysqli_query($conn,$sql);

  //fetch
  $users = mysqli_fetch_all($result,MYSQLI_ASSOC);

  //Freeresult from memory
  mysqli_free_result($result);

  //close connection
  mysqli_close($conn);

  // print_r($users);

?>

<!DOCTYPE html> 
<html>
  <?php include("./templates/header.php") ?>
  <div class="d-flex justify-content-center mt-5">
  <div class="col-8">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">User Name</th>
          <th scope="col">Password</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody  class="table-group-divider">
  <?php foreach($users as $user){ ?>
    

    <tr>
      <th scope="row"><?php echo htmlspecialchars($user["id"])?></th>
      <th scope="row"><?php echo htmlspecialchars($user["name"])?></th>
      <td><?php echo htmlspecialchars($user["user_name"])?></td>
      <td><?php echo htmlspecialchars($user["password"])?></td>
      <td><?php echo htmlspecialchars($user["status"])?></td>
      <td><a type="button" class="btn btn-danger btn-sm" href="updateUser.php?id=<?php echo $user["id"] ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

  </div>
  </div>

  <?php include("./templates/footer.php") ?>
</html>