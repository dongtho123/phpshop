
<?php include 'inc/header.php';?>
<?php
	if(!isset($_GET['catid']) || $_GET['catid']==NULL){
       echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['catid']; 
    }
    
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //     $catName = $_POST['catName'];
    //     $updateCat = $cat->update_category($catName,$id);
        
    // }
?>
<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="product spad">
        <div class="container">

        
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                    <?php
	     	 $name_cat = $cat->get_name_by_cat($id);
	      	 if($name_cat){
	      	 	while($result_name = $name_cat->fetch_assoc()){
	      	?>
    	         <li class="active" data-filter="*">Danh mục: <?php echo $result_name['catName'] ?></li>
    	<?php
			}}
			?>
                      
                      
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
            <?php
	      	 $productbycat = $cat->get_product_by_cat($id);
	      	 if($productbycat){
	      	 	while($result = $productbycat->fetch_assoc()){
	      	?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                       

                    <a href="product-details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>"  /></a>
                        <div class="product__item__text">
                            <h6><?php echo $result['productName'] ?></h6>
                            <a href="#" class="add-cart">
                            </a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></h5>
                     
                        </div>
                    </div>
                </div>
              <?php
				}
			}
				?>
      
       
       
       
       
       
            </div>

        </section>
            <?php include 'inc/footer.php';?>