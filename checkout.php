<?php
   include "inc/header.php";
 ?>
 <?php

if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder($customer_id);
    $delCart = $ct->del_all_data_cart();
    echo "<script>window.location ='checkok.php'</script>";
 }
 
?>
<!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
                </div>
            </div>
            <div class="checkout__form">
            <form action="" method="POST">
                <div class="row">
                <?php
				$id = Session::get('customer_id');
				$get_customers = $cs->show_customers($id);
				if($get_customers){
					while($result = $get_customers->fetch_assoc()){

				?>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>First Name <span>*</span></p>
                                    <input type="text" name="name" value="<?php echo $result['name'] ?>"class="checkout__input__add"  style="color:black; font: size 20px;"  >
                                </div>
                            </div>
                        </div>
                            
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" name="address" value="<?php echo $result['address'] ?>" class="checkout__input__add"style="color:black; font: size 20px;">
                                </div>
                            
                                <div class="checkout__form__input">
                                    <p>Postcode/Zip <span>*</span></p>
                                    <input type="text" name="zipcode" value="<?php echo $result['zipcode'] ?>"class="checkout__input__add"style="color:black; font: size 20px;" >
                                </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" name="phone" value="<?php echo $result['phone'] ?>"class="checkout__input__add"style="color:black; font: size 20px;" >
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text" name="email" value="<?php echo $result['email'] ?>"class="checkout__input__add"style="color:black; font: size 20px;" >
                                </div>
                            </div>
                            </div>
                            </div>
                            <?php

}}
?>
                             
                        <div class="col-lg-4">
                        <?php
			    	 if(isset($update_quantity_cart)){
			    	 	echo $update_quantity_cart;
			    	 }
			    	?>
			    	<?php
			    	 if(isset($delcart)){
			    	 	echo $delcart;
			    	 }
			    	?>

                            <div class="checkout__order">
                            <?php
                            $id = Session::get('customer_id');
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								while($result = $get_product_cart->fetch_assoc()){
							?>
                                <h5>Your order</h5>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    <li><?php echo $result['productName'] ?> <span>
                                   <?php $total = $result['price'] * $result['quantity'];
								echo $fm->format_currency($total)." "."VNĐ";
								 ?>
                                    </span></li>
                                   
                                </ul>
                                <?php
								$subtotal += $total;
							$qty = $qty + $result['quantity'];
							}
						}?>
                         <?php
							$check_cart = $ct->check_cart();
								if($check_cart){
								?>

                               <ul class="checkout__total__all">
                                    <li>Subtotal <span>
                                   <?php echo $fm->format_currency($subtotal)." "."VNĐ";
									Session::set('sum',$subtotal);
									Session::set('qty',$qty);
								?>
                                    </span></li>
                                    <li>VAT <span>10%
                                </span></li>
                                
                            <li>Total <span>
                                <?php 

								$vat = $subtotal * 0.1;
								$gtotal = $subtotal + $vat;
								echo $fm->format_currency($gtotal)." "."VNĐ";
								?>
                            </span></li>
                                </ul>
                               
                                <?php
					}else{
						echo 'Your Cart is Empty ! Please Shopping Now';
					}
					  ?>
                                <a href="?orderid=order" class="site-btn">Place oder</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Checkout Section End -->

    
<?php
   include "inc/footer.php";
 ?>