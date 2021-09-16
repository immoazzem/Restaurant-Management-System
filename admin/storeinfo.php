<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>
<?php
$msg = "";
if(isset($_POST['submit'])){
  
  $company_name = $_POST['company_name'];
  $service_charge_value = $_POST['service_charge_value'];
  $vat_charge_value = $_POST['vat_charge_value'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $country = $_POST['country'];
  $currency = $_POST['currency'];

  $sql =" UPDATE `restaurant_info` SET `restaurant_name` = '$company_name', `address` = '$address', `email` = '$email', `phone` = '$phone', `service_charge_value` = '$service_charge_value ', `vat_charge_value` = '$vat_charge_value', `currency` = '$currency' WHERE `restaurant_info`.`id` = 1";
  $mysqli->query($sql);
  if($mysqli->affected_rows){
    $msg = "<span class='bg-success'>Successfully Updated</span>";
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
            <h1 class="m-0">Store Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Store</a></li>
              <li class="breadcrumb-item active">Store Info</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Store Information</h3>
              <br>
              <div><?php echo $msg;?></div>
              <br>
            </div>
            <form role="form" action="" method="post">
              <div class="box-body">
              <?php 
                $sql = "SELECT * FROM restaurant_info WHERE id =1";
                $res = $mysqli->query($sql);
                while($row = $res->fetch_assoc()){?>
                <div class="form-group">
                  <label for="company_name">Company Name</label>
                  <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" value="<?php echo $row['restaurant_name'] ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="service_charge_value">Charge Amount (%)</label>
                  <input type="text" class="form-control" id="service_charge_value" name="service_charge_value" placeholder="Enter charge amount %" value="<?php echo $row['service_charge_value'] ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="vat_charge_value">Vat Charge (%)</label>
                  <input type="text" class="form-control" id="vat_charge_value" name="vat_charge_value" placeholder="Enter vat charge %" value="<?php echo $row['vat_charge_value'] ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?php echo $row['address'] ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="<?php echo $row['phone'] ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $row['email'] ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="country">Country</label>
                  <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" value="<?php echo $row['country'] ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="currency">Currency</label>
                  <input type="text" class="form-control" id="currency" name="currency" placeholder="Enter currency" value="<?php echo $row['currency'] ?>" autocomplete="off">
                </div>
                <?php }?>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once "partials/_footer.php"; ?>