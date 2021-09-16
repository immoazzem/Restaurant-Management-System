<?php require_once "partials/_header.php"; ?>
<?php require_once "partials/_sidebar.php"; ?>
<?php
$msg='';
if(isset($_POST['submit'])){
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
      $sql = "INSERT INTO `products` (`category_id`, `store_id`, `name`, `price`, `description`, `image`, `active`) VALUES ('$category_id', '$store_id', '$product_name', '$price', '$description', '$product_image_name', '$active')";

      if($mysqli->query($sql)){
        move_uploaded_file($product_image_tmp,"../assets/dist/img/".$product_image_name);
        $msg = "<div><span class='alert alert-success alert-dismissible'>Added successfully</span></div>";
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
            <h1 class="m-0">Add Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Product</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
            <br>
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Add Product</h3>
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
                      <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" autocomplete="off" value="" />
                    </div>

                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" autocomplete="off" value=""/>
                    </div>

                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter description" autocomplete="off"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control select_group" id="category" name="category">
                      <?php
                        $sql = "SELECT * FROM category";
                        $res = $mysqli->query($sql);
                        while($row = $res->fetch_assoc()){?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="store">Store</label>
                      <select class="js-example-basic-multiple select_group form-control" id="store" name="store">
                        <?php 
                        $sql = "SELECT * FROM stores";
                        $res = $mysqli->query($sql);
                        while($row = $res->fetch_assoc()){?>s
                        <option value="<?php echo $row['id']?>"><?php echo $row['name'] ?></option>
                        <?php }?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="store">Active</label>
                      <select class="select_group form-control" id="active" name="active">
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                    <a href="" class="btn btn-warning">Back</a>
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