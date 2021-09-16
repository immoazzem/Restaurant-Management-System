<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>
<?php
  $msg = '';
  $id = $_REQUEST['id'];
  $sql = "SELECT * FROM tables WHERE id = '$id'";
  $res = $mysqli->query($sql);
  $row = $res->fetch_assoc();


  if($_SERVER['REQUEST_METHOD'] == 'POST')
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
    $sql = "UPDATE tables SET table_name = '$table_name',capacity = '$capacity', available = '$available',active = '$active',store_id = '$store_id' WHERE id = '$id'";
    $mysqli->query($sql);
    if($mysqli->affected_rows){
      $msg = "<span class='alert alert-success alert-dismissible'>Updated successfully</span>";
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
            <h1 class="m-0">Edit Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Table</a></li>
              <li class="breadcrumb-item active">Edit Table</li>
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
                <h5 class="box-title">Edit Table</h5>
              </div>
              <br>
              <div><?php echo $msg;?></div>
            <form role="form" action="" method="post" id="createForm">
              <div class="box-body">
                <div class="form-group">
                  <label for="brand_name">Table Name</label>
                  <input type="text" class="form-control" id="table_name" name="table_name" value="<?php if(isset($_POST['table_name'])){ echo $_POST['table_name']; } else { echo $row['table_name']; } ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="brand_name">Capacity</label>
                  <input type="text" class="form-control" id="capacity" name="capacity" value="<?php if(isset($_POST['capacity'])){ echo $_POST['capacity']; } else { echo $row['capacity']; } ?>" autocomplete="off">
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
                    <tr role="row">
                        <td><?php
                        $stid = $row['store_id'];
                        $stquery = "SELECT * FROM stores WHERE id = '$stid'";
                        $result = $mysqli->query($stquery);
                        while($srow = $result->fetch_assoc()){?>
                        <option value="<?php
                        if(isset($_POST['store'])){ echo $_POST['store']; } else { echo $row['store_id']; }
                        
                        ?>" selected><?php
                        if(isset($_POST['store_name'])){ echo $_POST['store_name']; } else { echo $srow['name']; }


                        ?></option>
                        <?php }?>

                      
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
                  <a href="managetables.php" class="btn btn-warning">Back</a>
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