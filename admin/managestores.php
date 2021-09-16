<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>
<?php

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage  <small> Stores</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Stores</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-xs-12">

            <div class="box">
              <div class="box-header">
                <h5 class="box-title">Manage Store</h5>
              </div>
              <div class="box-body">
                <table id="manageTable" class="table table-bordered table-striped dataTable no-footer">
                  <thead>
                    <tr>
                      <th>Store Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM stores";
                    $res = $mysqli->query($sql);
                    while($row = $res->fetch_assoc()){?>
                    <tr>
                      <td><?php echo $row['name'] ?></td>
                      <td><?php if($row['active']==1){
                            echo "<span class='btn bg-success'>Active</span>";
                          } else {
                            echo "<span class='btn btn-danger'>Inactive</span>";
                          } ?></td>
                      <td><a href="editstore.php?id=<?php echo $row['id']?>" class="btn btn-default" onclick=""><i class="fas fa-edit"></i></a> <a href="deletestore.php?id=<?php echo $row['id']?>" class="btn btn-default" onclick=""><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once "partials/_footer.php"; ?>


          
