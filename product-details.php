<?php
   include "inc/header.php";
 ?>
 <?php
if(!isset($_GET['proid']) || $_GET['proid']==NULL){
    echo "<script>window.location ='404.php'</script>";
 }else{
     $id = $_GET['proid']; 
  
 }
 if(!isset($_GET['catid']) || $_GET['catid']==NULL){
   
 }else{
     $id = $_GET['catid']; 
 }
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $quantity = $_POST['quantity'];
    $insertCart = $ct->add_to_cart($quantity, $id);
    
}
 
  $customer_id = Session::get('customer_id');
 
 if(isset($_POST['binhluan_submit'])){
    $$product_id = $_GET['proid']; 
     $binhluan_insert = $cs->insert_binhluan();
 }
 
  
 ?>
<!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="#">Women’s </a>
                        <span>Essential structured blazer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
    <?php

$get_product_details = $product->get_details($id);
if($get_product_details){
    while($result_details = $get_product_details->fetch_assoc()){


?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-1">
                                <img src="admin/uploads/<?php echo $result_details['image']  ?>" alt="">
                            </a>
                            <a class="pt" href="#product-2">
                                <img src="admin/uploads/<?php echo $result_details['image']  ?>" alt="">
                            </a>
                            <a class="pt" href="#product-3">
                            <img src="admin/uploads/<?php echo $result_details['image']  ?>" alt="">
                            </a>
                            <a class="pt" href="#product-4">
                            <img src="admin/uploads/<?php echo $result_details['image']  ?>" alt="">
                            </a>
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="admin/uploads/<?php echo $result_details['image']  ?>" alt="">
                                <img data-hash="product-2" class="product__big__img" src="admin/uploads/<?php echo $result_details['image']  ?>" alt="">
                                <img data-hash="product-3" class="product__big__img" src="admin/uploads/<?php echo $result_details['image']  ?>" alt="">
                                <img data-hash="product-4" class="product__big__img" src="admin/uploads/<?php echo $result_details['image']  ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3><?php echo $result_details['productName'] ?></h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div>
                        <div class="product__details__price"><?php echo $fm->format_currency($result_details['price'])." "."VNĐ" ?> </div>
                        <p><?php echo $result_details['product_desc'] ?></p>
                        <div class="product__details__button">
                        <form action="" method="post">
                            <div class="quantity">
                            <div class="pro-qty">
                                    <input type="number" class="buyfield" name="quantity" value="1" min="1"/>>
                                </div>
                            </div>  
                            <input type="submit" name="submit" value="add to cart"  class="cart-btn"/>
                        </form>
                            <?php
						if(isset($insertCart)){
							
						
					?>		
                    <?php echo $insertCart ?>
                       </div>   
                    <?php
                        }
                    ?>                              
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Categories:</span><?php echo $result_details['catName'] ?> 
                                </li>
                                <li>
                                    <span>Categories:</span>
                                    <?php echo $result_details['brandName'] ?> 
                                </li>
                                <li>
                                    <span>Available size:</span>
                                    <div class="size__btn">
                                        <label for="xs-btn" class="active">
                                            <input type="radio" id="xs-btn">
                                            xs
                                        </label>
                                        <label for="s-btn">
                                            <input type="radio" id="s-btn">
                                            s
                                        </label>
                                        <label for="m-btn">
                                            <input type="radio" id="m-btn">
                                            m
                                        </label>
                                        <label for="l-btn">
                                            <input type="radio" id="l-btn">
                                            l
                                        </label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
              
            </div>
            <?php
            }
        }?>
        </section>
        <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="" method="POST">
                    <div class="row">
                   
				
                <div class="col-lg-6 col-md-6">
                   
                    <center><h6 class="checkout__title">Comment</h6></center>
                    <div class="row">
                    <div class="container">
<div class="row bootstrap snippets bootdeys">
    <div class="col-md-12 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">
               
                <div class="panel-body">
                <div class="form-group">
                <?php
			if(isset($binhluan_insert)){
				echo $binhluan_insert;
			} 
			?>
                 <form action="" method="post">
                <input type="hidden"  class="form-control form-control-user" value="<?php echo $id ?>" name="product_id_binhluan">
                 <input  class="form-control form-control-user"
                    type="text" name="tennguoibinhluan" placeholder="Enter Name....">
                     </div>
                    <textarea class="form-control" name="binhluan" placeholder="write a comment..." rows="6"></textarea>
                    <br>
                    <input type="submit" name="binhluan_submit" class="btn btn-success" value="Gửi bình luận">
                 </form>
                    <div class="clearfix"></div>
                    <hr>

                    <?php
						  $show_comment = $cs->show_comment();
						   if($show_comment){
						
							while($result = $show_comment->fetch_assoc()){
							
							
					       ?>
                    <ul class="media-list">
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted">30 min ago</small>
                                </span>
                                <strong class="text-success"><?php   echo $result['tenbinhluan']  ?></strong>
                                <p>
                                <?php echo $result['binhluan'] ?>

                                 
                                </p>
                            </div>
                        </li>
                      
                    </ul>

                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
                    </div>
                  
                  
                   
                </div>
               

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                <?php
	      	 $productbycat = $product->get_product_by_cat($id);
	      	 if($productbycat){
	      	 	while($result = $productbycat->fetch_assoc()){
	      	?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    
                    <div class="product__item">
                        <div class="product__item__pic set-bg"><a href="product-details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>"  /></a>
                        </div>
                        <div class="product__item__text">
                            <h6><?php echo $result['productName'] ?></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></div>
                        </div>
                    </div>
                </div>
                <?php
    }
}
        ?>
            </div>
        </div>

    <!-- Product Details Section End -->
    <?php
   include "inc/footer.php";
 ?>