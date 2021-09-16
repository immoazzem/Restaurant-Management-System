<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Profile</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Profile</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-condensed table-hovered">
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM users WHERE id = 1";
                        $res = $mysqli->query($sql);
                        while($row = $res->fetch_assoc()){?>
                        <tr>
                            <th>Username</th>
                            <td><?php echo $row['username']?></td>
                            </tr>
                            <tr>
                            <th>Email</th>
                            <td><?php echo $row['email']?></td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td><?php echo $row['firstname']?></td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td><?php  echo $row['lastname']?></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td><?php  echo ($row['gender'] == 1) ? 'Male' : 'Female'; ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?php  echo $row['phone']?></td>
                        </tr>
                        <tr>
                            <th>Group</th>
                            <td><span class="label label-info">Administrator</span></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once "partials/_footer.php"; ?>