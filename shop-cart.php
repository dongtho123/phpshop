<?php
   include "inc/header.php";
 ?>
 <?php
	if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid']; 
        $delcart = $ct->del_product_cart($cartid);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $update_quantity_cart = $ct->updatecart($quantity, $cartId);
        if($quantity<=0){
        	$delcart = $ct->del_product_cart($cartId);
        }
        
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

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								while($result = $get_product_cart->fetch_assoc()){
							?>
						
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="admin/uploads/<?php echo $result['image'] ?>" alt="" style=" with:150px; height:100px;">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $result['productName'] ?></h6>
                                        </div>
                                    </td>
                                    <td class="cart__price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></td>
                                    
                                    <td class="cart__quantity">
                                    <form action="" method="post">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                        <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>"/>
                                        <input  type="number" name="quantity" min="0"  value="<?php echo $result['quantity'] ?>"/>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="cart__total"><?php
								$total = $result['price'] * $result['quantity'];
								echo $fm->format_currency($total)." "."VNĐ";
								 ?></td>
                                    <td class="cart__close"><a href="?cartid=<?php echo $result['cartId'] ?>"><i  class="fa fa-close"></i></a>
                                </td>
                                </tr>
                                <?php
								$subtotal += $total;
							$qty = $qty + $result['quantity'];
							}
						}
						?>
                            </tbody>
                        </table>
                    </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="#">Continue Shopping</a>
                    </div>
                </div>
                </div>

</form>
</div>

                    <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                    <?php
							$check_cart = $ct->check_cart();
								if($check_cart){
								?>


                    <div class="cart__total">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal<span><?php 

									
                                   echo $fm->format_currency($subtotal)." "."VNĐ";
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
			$login_check = Session::get('customer_login'); 
			if($login_check==false){
				echo ' <a href="login.php" class="primary-btn">Thanh Toán</a>';
			}else{
				echo ' <a href="checkout.php" class="primary-btn">checkout</a>';
			}
			?>
             </div>
                    </div>
             </div>
                    <?php
					}else{
						echo 'Your Cart is Empty ! Please Shopping Now';
					}
					  ?>
                      
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

    <?php
   include "inc/footer.php";
 ?>

  