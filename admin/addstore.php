<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>
<?php
  $msg = '';
  if(isset($_POST['submit']))
  {
    $name = $_POST['store_name'];
    $active = $_POST['active'];
    $sql = "INSERT INTO stores(name,active) VALUES('$name','$active')";
    $res = $mysqli->query($sql);
    if($mysqli->affected_rows){
      $msg = "Added successfully";
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
            <h1 class="m-0">Add Store</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-store-alt nav-icon"></i> Store </a></li>
              <li class="breadcrumb-item active"> Add Store</li>
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
                    <h5 class="box-title">Add Stores</h5>
                  </div>
                  <div><?php echo $msg;?></div>
                <form role="form" action="" method="post" id="createForm">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="brand_name">Store Name</label>
                      <input type="text" class="form-control" id="store_name" name="store_name" placeholder="Enter store name" autocomplete="off">
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
                      <button type="reset" class="btn btn-warning">Reset</button>
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

