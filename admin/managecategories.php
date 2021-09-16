<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Category</a></li>
              <li class="breadcrumb-item active">Manage Categories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="manageTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="manageTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="manageTable_info" style="width: 1069px;">
                      <thead>
                        <tr role="row">
                          <th class="sorting" tabindex="0" aria-controls="manageTable" rowspan="1" colspan="1" aria-label="Category name: activate to sort column ascending" style="width: 425px;">Category name</th>
                          <th class="sorting" tabindex="0" aria-controls="manageTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 236px;">Status</th>
                          <th class="sorting" tabindex="0" aria-controls="manageTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 292px;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT * FROM category";
                        $res = $mysqli->query($sql);
                        while($row = $res->fetch_assoc()){?>
                        <tr role="row">
                          <td><?php echo $row['name']?></td>
                          <td>
                          <?php
                          if($row['active']==1){
                            echo "<span class='btn btn-success'>Active</span>";
                          } else {
                            echo "<span class='btn btn-danger'>Inactive</span>";
                          }
                          ?>
                          </td>
                          <td><a href="editcategory.php?id=<?php echo $row['id']?>" class="btn btn-default" ><i class="fas fa-edit"></i></a> <a href="deletecategory.php?id=<?php echo $row['id']?>" class="btn btn-default" ><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once "partials/_footer.php"; ?>