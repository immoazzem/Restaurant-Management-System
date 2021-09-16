<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active">Manage Users</li>
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
        <div class="" id="alertMsg" role="alert">
          
        </div>
                <a href="adduser.php" class="btn btn-primary">Add User</a>
            <br> <br>         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="userTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="userTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="userTable_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 148.938px;">Username</th>
                          <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 181.734px;">Email</th>
                          <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 127.719px;">Name</th>
                          <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 133.562px;">Phone</th>
                          <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1" colspan="1" aria-label="Group: activate to sort column ascending" style="width: 103.25px;">Group</th>
                          <th class="sorting" tabindex="0" aria-controls="userTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 138.797px;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT * FROM users";
                        $res = $mysqli->query($sql);
                        while($row = $res->fetch_assoc()){?>
                        <tr role="row">
                          <td><?php echo $row['username']?></td>
                          <td><?php echo $row['email']?></td>
                          <td><?php echo $row['firstname'].' '.$row['lastname']?></td>
                          <td><?php echo $row['phone']?></td>
                          <td></td>
                          <td><a href="edituser.php?id=<?php echo $row['id']?>" class="btn btn-default"><i class="fas fa-edit"></i></a><a href="deleteuser.php?id=<?php echo $row['id']?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

<?php require_once "partials/_footer.php"; ?>

<script>
    $(document).ready(function () {
      $("#alertMsg").click(function(){
        $(this).hide();
      })
    });
</script>