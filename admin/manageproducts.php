<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Tables</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Product</a></li>
              <li class="breadcrumb-item active">Manage Products</li>
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
                <div id="messages"></div>
                    <a href="addproduct.php" class="btn btn-primary">Add Product</a>
                    <a href="" class="btn btn-success">View Product</a>
                <br> <br>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Manage Products</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="manageTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                <table id="manageTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="manageTable_info" style="width: 1070px;">
                                    <thead>
                                    <tr role="row">
                                        <th class="" tabindex="0" aria-controls="manageTable" rowspan="1" colspan="1" style="width: 120px;">Image</th>
                                        <th class="" tabindex="0" aria-controls="manageTable" rowspan="1" colspan="1" style="width: 223px;">Product Name</th>
                                        <th class="" tabindex="0" aria-controls="manageTable" rowspan="1" colspan="1" style="width: 106px;">Price</th>
                                        <th class="" tabindex="0" aria-controls="manageTable" rowspan="1" colspan="1" style="width: 110px;">Store</th>
                                        <th class="" tabindex="0" aria-controls="manageTable" rowspan="1" colspan="1" style="width: 122px;">Status</th>
                                        <th class="" tabindex="0" aria-controls="manageTable" rowspan="1" colspan="1" style="width: 156px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr role="row">
                                        <?php 
                                        $sql = "SELECT * FROM products";
                                        $res = $mysqli->query($sql);
                                        while($row = $res->fetch_assoc()){?>

                                        <td><img src="dist/img/<?php echo $row['image']?>" alt="" class="img-circle" width="50" height="50"></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['price']?></td>
                                        <td><?php
                                            $stid = $row['store_id'];
                                            $stquery = "SELECT * FROM stores WHERE id = '$stid'";
                                            $result = $mysqli->query($stquery);
                                            while($srow = $result->fetch_assoc()){
                                            echo $srow['name'];
                                            }
                                        ?>
                                        </td>
                                        <td><?php if($row['active']==1){
                                            echo "<span class='btn bg-success'>Active</span>";
                                          } else {
                                            echo "<span class='btn btn-danger'>Inactive</span>";
                                          } ?>
                                          </td>
                                        <td><a href="editproduct.php?id=<?php echo $row['id']?>" class="btn btn-default"><i class="fas fa-edit"></i></a>
                                        
                                        <a href="deleteproduct.php?id=<?php echo $row['id']?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                      </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          <!-- /.box-body -->
            </div>
        <!-- /.box -->
        </div>
      <!-- col-md-12 -->
        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once "partials/_footer.php"; ?>