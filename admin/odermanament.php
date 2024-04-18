<?php include './inc/header.php';?>

<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/cart.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php
	$ct = new cart();
	if(isset($_GET['shiftid'])){
     	$id = $_GET['shiftid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted = $ct->shifted($id,$time,$price);
    }
    if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
        $del_shifted = $ct->del_shifted($id,$time,$price);
   }
    
?>
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">QUẢN LÝ ORDER</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    DANH SÁCH ORER
                </div>
            </div>
           
            <div class="alert alert-" style="border-radius:0px;">
               
            </div>
       
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center" id="dataTable"
                        width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:3em;">STT</th>
                                
                               
							<th>Order Time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Customer ID</th>
							<th>Address</th>
							<th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                       
						<?php
						$ct = new cart();
						$fm = new Format();
						$get_inbox_cart = $ct->get_order_cart();
						if($get_inbox_cart){
							$i = 0;
							while($result = $get_inbox_cart->fetch_assoc()){
								$i++;
                            
						 ?>
						
                            <tr>
                            <td><?php echo $i; ?></td>
							<td><?php echo $fm->formatDate($result['date_order']) ?></td>
							<td><?php echo $result['productName'] ?></td>
							<td><?php echo $result['quantity'] ?></td>
							<td><?php echo $result['price'].' '.'VNĐ' ?></td>
							<td><?php echo $result['customer_id'] ?></td>
							<td><a href="viewcustomer.php?customerid=<?php echo $result['customer_id'] ?>">View Customer</a></td>
                            <td>
							<?php 
							if($result['status']==0){
							?>

								<a href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Pending</a>

								<?php
							}elseif($result['status']==1){
								?>
								<?php
								echo 'Shifting...';
								?>
							<?php
							}elseif($result['status']==2){
							?>

							<a href="?delid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Remove</a>

							<?php
								}
							
							?>
							</td>
                            </tr>
                            <?php
					}}
						?>
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>