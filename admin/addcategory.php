<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>
<?php
  $msg = '';
  if(isset($_POST['submit']))
  {
    $name = $_POST['category_name'];
    $active = $_POST['active'];
    $sql = "INSERT INTO category(name,active) VALUES('$name','$active')";
    $res = $mysqli->query($sql);
    if($mysqli->affected_rows){
      $msg = "<span class='bg-success'>Added successfully</span>";
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
            <h1 class="m-0">Add Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Category</a></li>
              <li class="breadcrumb-item active">Add Category</li>
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
              <h4 class="modal-title">Add Category</h4>
            </div>
            <div><?php echo $msg; ?></div>
          <form role="form" action="" method="post" id="createForm">
            <div class="box-body">
              <div class="form-group">
                <label for="brand_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="active">Status</label>
                <select class="form-control" id="active" name="active">
                  <option value="1">Active</option>
                  <option value="2">Inactive</option>
                </select>
              </div>
            </div>
            <div class="box-footer">
              <div class="form-group">
                <button type="reset" name="reset" class="btn btn-default">Reset</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
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


<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      
        
        
      </form>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->