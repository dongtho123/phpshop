
<?php include 'inc/header.php';?>



<?php
 	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
	
	
?> 
<?php
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
    }
?>


<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
    <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                <div class="shopping__cart__table" >


              
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Date</th>
								    <th>Status</th>
                                    <th>Edit</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                	<?php
							$customer_id = Session::get('customer_id');
							$get_cart_ordered = $ct->get_cart_ordered($customer_id);
							if($get_cart_ordered){
								$i = 0;
								$qty = 0;
								$total = 0;
								while($result = $get_cart_ordered->fetch_assoc()){
									$i++;
									$total = $result['price']*$result['quantity'];
							?>



                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                        <img src="admin/uploads/<?php echo $result['image'] ?>" alt="" style=" with:150px; height:100px;">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <a href="shopdetail.php?proid=<?php echo $result['productId'] ?>">
                                            <h6><?php echo $result['productName'] ?></h6></a>
                                          
                                            
                                        </div>
                                    </td>
                                    <td class="cart__price">
                                        <div class="cart__price">
                                            <div class="cart__price">
                                            <?php echo $result['quantity'] ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></td>
                                    <td class="cart__price"><?php echo $fm->formatDate($result['date_order']) ?></td>
                                    <td class="cart__price"><?php
									if($result['status']=='0'){
										echo 'Chờ Xử Lý';
									}elseif($result['status']==1){ 
									?>
									<span>Đã Xử Lý</span>
									
									<?php
									}elseif($result['status']==2){
										echo 'Đã Nhận';
									}

									 ?></td>
                                   <?php
								if($result['status']=='0'){
								?>
								<td class="cart__price"><?php echo 'N/A';?></td>
								<?php
								
								}elseif($result['status']=='1'){
								
								?>
								<td><a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>"><i class="fas fa-check-circle">     Nhận</i></a></td>
								<?php
							}else{
								?>
								<td class="cart__price"><?php echo 'Đã Nhận'; ?></td>
								<?php
								}	
								?>
                                </tr>
                                <?php
							
                        }
                    }
                    ?>
                            </tbody>
                        </table>
                    </div>
        </div>
      
      
    </section>
    <?php include 'inc/footer.php';?>