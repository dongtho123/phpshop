
<?php include './inc/header.php';?>

<?php include '../classes/brand.php' ?>

<?php
	$class = new brand();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     	$brandName = $_POST['brandName'];
     

     	$insert_brand = $class->insert_brand($brandName);
     	
	}
?>

<div class="container-fluid">

<div class="container-fluid w-50 text-center">
    <form method="POST" action="brandadd.php">
       
        <div class="form-group">
            <h4 class="text-center">THÊM THƯƠNG HIỆU</h4>
            
            <span><?php
                                        
                                        if(isset($insert_brand)){
                                         echo $insert_brand;
                                            }
                                       ?></span>
            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group pb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Tên Thương Hiệu</span>
                                        </div>
                                        <input type="text" class="form-control" title="Tên Thương Hiệu Sản Phẩm"  name="brandName" autofocus>
                                    </div>
                                </div>
                               
                            </div>
                            <div>
                                
                            </div>
                            <input  type="submit" name="submit" Value="Save"   class="btn btn-primary btn-block btn-lg"/>
                          
    </form><br>

  
    
   
</div>
</div>