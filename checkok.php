<?php include 'inc/header.php';?>



<section class="checkout spad">

<?php
	
	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		echo "<script>window.location ='login.php'</script>";
	}
		
?>

<div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
           <div class="col-lg-8">
            <div class="checkout__order">
             <center><h4 class="order__title"> Thanh Toán Thành Công</h4></center>
              <?php
			 $customer_id = Session::get('customer_id');
			 $get_amount = $ct->get_cart_ordered($customer_id);
			 if($get_amount){
			 $amount = 0;
			while($result = $get_amount->fetch_assoc()){



			 $price = $result['price'];
			 $amount += $price; 

			 	}
			 }
			?>
                                  
                               
            <ul class="checkout__total__all">
            <li>Tổng tiền đơn hàng bạn đã đặt mua : <span>
             <?php

			$vat = $amount * 0.1;
			$total = $vat + $amount;
			echo $fm->format_currency($total). ' VNĐ';


			 ?>
              </span></li>
                                   
              </ul>
                              
                               
              <button type="submit" class="site-btn"><a href="odermanagement.php">Chi Tiết Đơn Hàng</a></button>
               </div>
                </div>
                </div>
            </div>
        </div>
      
    </section>
    <?php include 'inc/footer.php';?>