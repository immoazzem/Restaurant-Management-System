<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>
<?php
$msg='';
$id = $_REQUEST['id'];
$sql = "SELECT * FROM products WHERE id = '$id'";
$res = $mysqli->query($sql);
$row = $res->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $category_id = $_POST['category'];
  $store_id = $_POST['store'];
  $product_name = $_POST['product_name'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $active = $_POST['active'];
  $product_image_name = $_FILES['product_image']['name'];
  $product_image_size = $_FILES['product_image']['size'];
  $product_image_tmp = $_FILES['product_image']['tmp_name'];
  $product_image_ext = pathinfo($product_image_name, PATHINFO_EXTENSION);
  if($product_image_ext == 'jpg' || $product_image_ext == 'png' || $product_image_ext == 'jpeg'){
    if($product_image_size<=1e+6){
      $sql = "UPDATE `products` SET `category_id` = '$category_id', `store_id` = '$store_id', `name` = '$product_name', `price` = '$price', `description` = '$description', `image` = '$product_image_name', `active` = '$active' WHERE id = '$id'";

      if($mysqli->query($sql)){
        move_uploaded_file($product_image_tmp,"dist/img/".$product_image_name);
        $msg = "<div><span class='alert alert-success alert-dismissible'>Updated successfully</span></div>";
      } else {
        $msg = "<span class='alert alert-success alert-dismissible'>File Size must be under 1MB</span>";
      }
    } else {
      $msg = "<span class='alert alert-success alert-dismissible'>File format jpg,jpeg,png allowed</span>";
    }
  } else {
    $msg = 'error';
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
            <h1 class="m-0">Edit Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Product</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
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
              <br>
            <div id="messages"><?php echo $msg; ?></div>
            <br><br>
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Edit Product</h3>
              </div>
              <!-- /.box-header -->
              <form role="form" action="" method="post" enctype="multipart/form-data">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="product_image">Image</label>
                      <div class="kv-avatar">
                        <div class="file-loading">
                            <input id="product_image" name="product_image" type="file">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="product_name">Product name</label>
                      <input type="text" class="form-control" id="product_name" name="product_name" value="<?php if(isset($_POST['product_name'])){ echo $_POST['product_name']; } else { echo $row['name']; } ?>" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" autocomplete="off" value="<?php if(isset($_POST['price'])){ echo $_POST['price']; } else { echo $row['price']; } ?>"/>
                    </div>

                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea type="text" class="form-control" id="description" name="description" value="<?php if(isset($_POST['description'])){ echo $_POST['description']; } else { echo $row['description']; } ?>" autocomplete="off"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control select_group" id="category" name="category">
                      <?php
                        $sql = "SELECT * FROM category";
                        $res = $mysqli->query($sql);
                        while($crow = $res->fetch_assoc()){?>
                        <option value="<?php echo $crow['id']?>"><?php echo $crow['name']?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="store">Store</label>
                      <select class="form-control" id="store" name="store">
                        <?php
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
                    while($sttrow = $result->fetch_assoc()){ ?>
                    <option value="<?php echo $sttrow['id']?>"><?php echo $sttrow['name']?></option>
                    <?php } ?>
                  </select>
                    </div>

                    <div class="form-group">
                      <label for="">Active</label>
                      <select class="select_group form-control" id="active" name="active">
                          <option value="<?php if(isset($_POST['active'])){ echo $_POST['active']; } else { echo $row['active']; } ?>" selected><?php if($row['active']==1){
                            echo "<span class='btn bg-success'>Active</span>";
                          } else {
                            echo "<span class='btn btn-danger'>Inactive</span>";
                          } ?></option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  <a href="manageproducts.php" class="btn btn-warning">Back</a>
                  </div>
                </form>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- col-md-12 -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

<?php require_once "partials/_footer.php"; ?>
<script type="text/javascript">
  $(document).ready(function() {
    $(".select_group").select2();

    $("#productMainMenu").addClass('active');
    $("#createProductSubMenu").addClass('active');
    $("#product_image").fileinput({showCaption: false, dropZoneEnabled: false});
    
    // var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
    //     'onclick="alert(\'Call your custom code here.\')">' +
    //     '<i class="glyphicon glyphicon-tag"></i>' +
    //     '</button>'; 
    //     $("#product_image").fileinput({
    //     overwriteInitial: true,
    //     maxFileSize: 1500,
    //     showClose: false,
    //     showCaption: false,
    //     browseLabel: '',
    //     removeLabel: '',
    //     browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
    //     removeIcon: '<i class="bi-x-lg"></i>',
    //     removeTitle: 'Cancel or reset changes',
    //     elErrorContainer: '#kv-avatar-errors-1',
    //     msgErrorClass: 'alert alert-block alert-danger',
    //     // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
    //     layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
    //     allowedFileExtensions: ["jpg", "png", "gif"]
    // });

  });
</script>