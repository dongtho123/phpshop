<?php include './inc/header.php';?>
<?php include '../classes/category.php' ?>

<?php
	$class = new category();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     	$catName = $_POST['catName'];
     

     	$insert_category = $class->insert_category($catName);
     	
	}
?>
<div class="container-fluid">
<div class="container-fluid w-50 text-center">
    <form method="POST" action="categoryadd.php">
        <div class="form-group">
            <h4 class="text-center">THÊM DANH MỤC</h4>
            <span><?php 
            if(isset($insert_category)){
                echo $insert_category;
            }   
            ?></span>
        <div class="row">
            <div class="col-md-12">
                <div class="input-group pb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tên Danh Mục</span>
                            </div>
            <input type="text" class="form-control" title="Tên Danh Mục Sản Phẩm"  name="catName" autofocus>
                </div>
            </div>     
            </div>
        <div>
    </div>
<input  type="submit" name="submit" Value="Save" class="btn btn-primary btn-block btn-lg"/>     
    </form><br>
</div>
</div>