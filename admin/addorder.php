<?php require_once "partials/_header.php";
  require_once "partials/_sidebar.php";
  date_default_timezone_set('Asia/Dhaka'); ?>
  <?php
    $product='';
    $sql = "SELECT * FROM products";
    $result = $mysqli->query($sql);
    foreach ($result as $row){
      $product .= "<option value=".$row['id'].">" .$row['name']."</option>";
    }
    $table = '';
    $sql = "SELECT * FROM tables";
    $result = $mysqli->query($sql);
    foreach ($result as $row){
      $table .= "<option value=".$row['id'].">" .$row['table_name']."</option>";
    }

    $vat= '';
    $sql = "SELECT * FROM restaurant_info";
    $result = $mysqli->query($sql);
    foreach ($result as $row){
      $vat .= $row['vat_charge_value'];
    }


    if(isset($_POST['submit'])){
      $sql = "INSERT INTO orders (bill_no, date_time, gross_amount, service_charge_rate, service_charge_amount, vat_charge_rate, vat_charge_amount, discount, net_amount, table_id, paid_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
      // mysqli_prepare($mysqli, $sql);
      $ins = $mysqli->prepare($sql);
		  $user_id = 1;
		  $bill_no = 'BILPR-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
    	$data = array(
    		'bill_no' => $bill_no,
    		'date_time' => strtotime(date('Y-m-d h:i:s a')),
    		'gross_amount' => $_POST['gross_amount'],
    		'service_charge_rate' => 0,
    		'service_charge_amount' => 0,
    		'vat_charge_rate' => $vat,
    		'vat_charge_amount' => ($_POST['vat_charge'] > 0) ? $_POST['vat_charge'] : 0,
    		'net_amount' => $_POST['net_amount'],
    		'discount' => 0,
    		'user_id' => $user_id,
    		'table_id' => $_POST['table_name'],
    		'store_id' => 1,
        'paid_status' => $_POST['payment']
    	);

      $ins->bind_param('oa', $data);
      $ins->execute();

      $lis = $mysqli->query("SELECT LAST_INSERT_ID()");
      $order_id = $lis->num_rows;

		// $insert = $this->db->insert('orders', $data);
		// $order_id = $this->db->insert_id();

		$count_product = count($_POST['product']);
    	for($x = 0; $x < $count_product; $x++) {
    		$items = array(
    			'order_id' => $order_id,
    			'product_id' => $_POST['product'][$x],
    			'qty' => $_POST['qty'][$x],
    			'rate' => $_POST['rate_value'][$x],
    			'amount' => $_POST['amount_value'][$x],
    		);

        $query = "INSERT INTO `order_items` (`order_id`, `product_id`, `product_name`, `quantity`, `rate`, `amount`) VALUES (`order_id`, `product_id`, `product_name`, `quantity`, `rate`, `amount`)";
        $pins = $mysqli->prepare($query);
        $pins->bind_param('xs', $items);
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
            <h1 class="m-0">Add Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Order</a></li>
              <li class="breadcrumb-item active">Add Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
    <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add Order</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group d-flex justify-content-end">
                  <label for="" class="col-sm-12 control-label d-flex justify-content-end">Date: <?php echo date('Y-m-d') ?></label>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-12 control-label d-flex justify-content-end">Date: <?php echo date('h:i a') ?></label>
                </div>

                <div class="col-md-4 col-xs-12 pull pull-left">

                  <div class="form-group">
                    <label for="" class="col-sm-5 control-label" style="text-align:left;">Table</label>
                    <div class="col-sm-7">
                      <select class="form-control" id="table_name" name="table_name">
                        <option value=""></option><?php echo $table; ?>
                      </select>
                    </div>
                  </div>

                </div>
                
                
                <br /> <br/>
                <table class="table table-bordered" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:50%">Product</th>
                      <th style="width:10%">Qty</th>
                      <th style="width:10%">Rate</th>
                      <th style="width:20%">Amount</th>
                      <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button></th>
                    </tr>
                  </thead>
                   <tbody>
                     
                   </tbody>
                   <tfoot>
                   <tr >
                      <td colspan="2"></td>
                      <th>Gross Amount</th>
                      <td><input type="text" class="form-control" value="" id="gross_amount" name="gross_amount" disabled>
                      <input type="hidden" class="form-control" id="gross_amount_value" name="gross_amount_value" autocomplete="off"></td>
                      <td></td>
                      
                      
                    </tr>
                    <tr>
                      <td colspan="2"></td>
                      <th style="width:10%">Vat <?php echo $vat ;?> %</th>
                      <td><input type="text" class="form-control" id="vat_charge" name="vat_charge" disabled></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan="2"></td>
                      <th style="width:10%">Net Amount</th>
                      <td><input type="text" class="form-control" id="net_amount" name="net_amount" disabled></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan="2"></td>
                      <th style="width:10%">Paymment</th>
                      <td>
                        <select name="payment" id="payment" class="form-select">
                          <option value="Unpaid">Unpaid</option>
                          <option value="Paid">Paid</option>
                        </select>
                      </td>
                      <td></td>
                    </tr>
                  </tfoot>
                </table>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Create Order</button>
                <a href="" class="btn btn-warning">Back</a>
              </div>
            </form>
          <!-- /.box-body -->
        </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once "partials/_footer.php"; ?>
<script>
  $(document).ready(function(){
    
    var i = 0;

    $("#add_row").click(function(){
      i++;

      var html = "";

      html += '<tr id="row_'+i+'">';

      html += '<td><select class="form-control select_group product" id="product_'+i+'" name="product[]" style="width:100%;" data-product-id='+i+' required><option value="">Select One</option><?php echo $product ?></select></td>';

      html += '<td><input type="number" min="1" max="20" value="" name="qty[]" id="qty_'+i+'" class="form-control quantity" onchange="getTotal('+i+')" required></td>';

      html += '<td><input type="text" name="rate[]" id="rate_'+i+'" data-product-price='+i+' class="form-control pdt_price" autocomplete="off"><input type="hidden" name="rate_value[]" id="rate_value_'+i+'" class="form-control"></td>';

      html += '<td><input type="text" name="amount[]" id="amount_'+i+'" class="form-control" disabled autocomplete="off"><input type="hidden" name="amount_value[]" id="amount_value_'+i+'" class="form-control"></td>';

      html += '<td><button name="remove" id="'+i+'" type="button" class="btn btn-default btn_remove"><i class="far fa-window-close"></i></button></td>';

      html += '</tr>';

      html += '';

      $('tbody').append(html);
      $('')
      
      $(document).on('click', '.btn_remove', function() {
          $(this).closest('tr').remove();
      }); 
    });


    $(document).on("change", ".product", function(){

      var product_id = $(this).val();

      if(product_id != '' ){

        var price_id = $(this).data('product-id');

        $.ajax({
          url: "orderaction.php",
          method: "POST",
          data: {
                  action:'load_price',
                  pid : product_id
                },
          success: function(data){
            var price = data;
            $('#rate_' + price_id).val(price);
            $('#rate_value_' + price_id).val(price);
            var st = $("#qty_"+ price_id).val(1);

            var total = Number(price) * 1;
            total = total.toFixed(2);
            $("#amount_"+price_id).val(total);
            $("#amount_value_"+price_id).val(total);
            
            subAmount();
          }
        })
      }

    });


  });

  function getTotal(row = null) {
      if(row) {
        var total = Number($("#rate_"+row).val()) * Number($("#qty_"+row).val());
        total = total.toFixed(2);
        $("#amount_"+row).val(total);
        $("#amount_value_"+row).val(total);
        
        subAmount();
      } else {
        alert('no row !! please refresh the page');
      }
    }




  function subAmount(){
      var vat_charge = <?php echo ($vat > 0) ? $vat:0; ?>;
      var tableProductLength = $("#product_info_table tbody tr").length;
      var totalSubAmount = 0;
      for(x = 0; x < tableProductLength; x++) {
      var tr = $("#product_info_table tbody tr")[x];
      var count = $(tr).attr('id');
      count = count.substring(4);

      totalSubAmount = Number(totalSubAmount) + Number($("#amount_"+count).val());
      }
      totalSubAmount = totalSubAmount.toFixed(2);

      // sub total
      $("#gross_amount").val(totalSubAmount);
      $("#gross_amount_value").val(totalSubAmount);

      // vat
      var vat = (Number($("#gross_amount").val())/100) * vat_charge;
      vat = vat.toFixed(2);
      $("#vat_charge").val(vat);
      $("#vat_charge_value").val(vat);
      
      // total amount
      var totalAmount = (Number(totalSubAmount) + Number(vat));
      totalAmount = totalAmount.toFixed(2);
      $("#net_amount").val(totalAmount);
      // $("#totalAmountValue").val(totalAmount);

    }


</script>