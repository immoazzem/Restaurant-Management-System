<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Groups</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Group</a></li>
              <li class="breadcrumb-item active">Manage Groups</li>
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
                          <th class="sorting" tabindex="0" aria-controls="manageTable" rowspan="1" colspan="1" aria-label="Category name: activate to sort column ascending" style="width: 425px;">Group name</th>
                          <th class="sorting" tabindex="0" aria-controls="manageTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 292px;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT * FROM groups";
                        $res = $mysqli->query($sql);
                        while($row = $res->fetch_assoc()){?>
                        <tr role="row">
                          <td><?php echo $row['group_name']?></td>
                          <td><button type="button" class="btn btn-default" onclick="editFunc(1)"><i class="fas fa-edit"></i></button> <button type="button" class="btn btn-default" onclick="removeFunc(1)"><i class="fa fa-trash"></i></button>
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