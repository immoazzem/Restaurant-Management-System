<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>
<?php
  $msg = '';
  $id = $_REQUEST['id'];
  $sql = "SELECT * FROM stores WHERE id ='$id'";
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $name = $_POST['store_name'];
    $active = $_POST['active'];
    $sql = "UPDATE stores SET name='$name',active = '$active' WHERE id = '$id'";
    $res = $mysqli->query($sql);
    if($mysqli->affected_rows){
      $msg = "<span class='mx-3 alert alert-success'>Updated successfully</span>";
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
            <h1 class="m-0">Edit Store</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-store-alt nav-icon"></i> Store </a></li>
              <li class="breadcrumb-item active"> Edit Store</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="box">
                  <div class="box-header">
                    <h5 class="box-title">Edit Stores</h5>
                  </div>
                  <br>
                  <div class="mx-3"><?php echo $msg;?></div>
                <form role="form" action="" method="post" id="createForm">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="brand_name">Store Name</label>
                      <input type="text" class="form-control" id="store_name" name="store_name" value="<?php if(isset($_POST['store_name'])){ echo $_POST['store_name']; } else { echo $row['name']; } ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label for="active">Status</label>
                      <select class="form-control select2-dropdown--above" id="active" name="active">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="box-footer">
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">Save</button>
                      <a href="managestores.php" class="btn btn-warning">Back</a>
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

