<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>
<?php

$msg = '';
$id = $_REQUEST['id'];

$sql = "SELECT * FROM users WHERE id ='$id'";
$result = $mysqli->query($sql);
$urow = $result->fetch_assoc();


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $store = $_POST['store'];
  $group = $_POST['groups'];
  $sql = "UPDATE users SET username = '$username',password = '$password',email = '$email',firstname = '$firstname',lastname = '$lastname',phone = '$phone',gender = '$gender',store_id = '$store', group_id = '$group' WHERE id = '$id'";
  $mysqli->query($sql);
  if($mysqli->affected_rows>0){
    $msg = "<div class='alert alert-success alert-dismissible' id='alertMsg' role='alert'>
    Successfully Updated
  </div>";
  }
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <br>
          <div>
              <br>
            <?php echo $msg; ?>
            <br>
          </div>
          <br>
          <div class="box">
            <div class="box-header">
              <h5 class="box-title">Edit User</h5>
            </div>
            <form role="form" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="groups">Groups</label>
                  <select class="form-control" id="groups" name="groups">
                    <option value="" hidden>Select Groups</option>

                    <?php $sql = "SELECT * FROM groups";
                    $result = $mysqli->query($sql);
                    while($row = $result->fetch_assoc()){ ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['group_name']; ?></option>
                    <?php }?>
                  </select>
                  
                </div>
                <div class="form-group">
                  <label for="store">Store</label>
                  <select name="store" id="store" class="form-control">
                    <option value="" hidden>Select One</option>

                    <?php $sql = "SELECT * FROM stores";
                    $result = $mysqli->query($sql);
                    while($row = $result->fetch_assoc()){ ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php }?>

                  </select>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } else { echo $urow['username']; } ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" value="
                  <?php if(isset($_POST['email'])){ echo $_POST['email']; } else { echo $urow['email']; } 
                  ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="cpassword">Confirm Password</label>
                  <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="fname">First Name</label>
                  <input type="text" name="fname" class="form-control" id="fname" value="<?php if(isset($_POST['fname'])){ echo $_POST['fname']; } else { echo $urow['firstname']; } ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" name="lname" class="form-control" id="lname" value="<?php if(isset($_POST['lname'])){ echo $_POST['lname']; } else { echo $urow['lastname']; } ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" class="form-control" id="phone" value="<?php if(isset($_POST['phone'])){ echo $_POST['phone']; } else { echo $urow['phone']; } ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" value="1">
                      Male
                    </label>
                    <label>
                      <input type="radio" name="gender" id="female" value="2">
                      Female
                    </label>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  <a href="manageusers.php" class="btn btn-warning">Back</a>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

<?php require_once "partials/_footer.php"; ?>
<script>
    $(document).ready(function() {
      $("#groups").select2();

      $("#userMainNav").addClass('active');
      $("#createUserSubNav").addClass('active');
      
    });
  </script>