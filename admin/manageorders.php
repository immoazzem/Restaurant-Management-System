<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>
<?php
$msg = '<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>';



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Order</a></li>
              <li class="breadcrumb-item active">Manage Orders</li>
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

        <div id="messages"></div>

          <a href="addorder.php" class="btn btn-primary">Add Order</a>
          <br /> <br />

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Orders</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Bill no</th>
                <th>Store</th>
                <th>Date Time</th>
                <th>Total Products</th>
                <th>Total Amount</th>
                <th>Paid status</th>
                <th>PDF</th>
                <th>ACTION</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $sql = "SELECT * FROM orders";
              $result = $mysqli->query($sql);
              
              $total_rows = $mysqli->affected_rows;
              
              if($total_rows > 0){
                
                foreach($result as $row){
                  echo '
                  <tr>
                    <td>'.$row["bill_no"].'</td>
                    <td></td>
                    <td>'.$row["date_time"].'</td>
                    <td></td>
                    <td>'.$row["net_amount"].'</td>
                    <td>'.$row["paid_status"].'</td>
                    <td><a href="print_invoice.php?pdf=1&id='.$row["id"].'">PDF</a></td>
                    <td><a href="" id="'.$row["id"].'">EDIT</a>
                    <a href="invoice.php?update=1&id='.$row["id"].'">DELETE</a>
                    </td>

                  </tr>
                  ';
                }
              }
              ?>
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