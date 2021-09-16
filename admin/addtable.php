<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>
<?php
  $msg = '';
  if(isset($_POST['submit']))
  {
    $table_name = $_POST['table_name'];
    $capacity = $_POST['capacity'];
    $active = $_POST['active'];
    $available = '';
    if($_POST['active'] == 1){
      $available = 2;
    } else {
      $available = 1;
    }
    
    $store_id = $_POST['store'];
    $sql = "INSERT INTO tables(table_name,capacity,available,active,store_id) VALUES('$table_name','$capacity','$available', '$active','$store_id')";
    $res = $mysqli->query($sql);
    if($mysqli->affected_rows){
      $msg = "<span class='alert alert-success alert-dismissible'>Added successfully</span>";
    } else {
      $msg = "error";
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
            <h1 class="m-0">Add Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Table</a></li>
              <li class="breadcrumb-item active">Add Table</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="box">
        <div class="row">
          <div class="col-md-12 col-xs-12">
              <div class="box-header">
                <h5 class="box-title">Add Table</h5>
              </div>
              <div><?php echo $msg;?></div>
            <form role="form" action="" method="post" id="createForm">
              <div class="box-body">
                <div class="form-group">
                  <label for="brand_name">Table Name</label>
                  <input type="text" class="form-control" id="table_name" name="table_name" placeholder="Enter table name" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="brand_name">Capacity</label>
                  <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Enter capacity" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="active">Status</label>
                  <select class="form-control" id="active" name="active">
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="active">Store</label>
                  <select class="form-control" id="store" name="store">
                    <option value="" hidden>Select One</option>
                    <?php $sql = "SELECT * FROM stores";
                    $result = $mysqli->query($sql);
                    while($row = $result->fetch_assoc()){ ?>
                    <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                    <?php } ?>
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