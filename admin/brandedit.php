<?php include './inc/header.php';?>
<?php include '../classes/brand.php' ?>
<?php
   
    if(!isset($_GET['brandid']) || $_GET['brandid']==NULL){
       echo "<script>window.location ='brandlist.php'</script>";
    }else{
         $id = $_GET['brandid']; 
    }
     $brand = new brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $brandName = $_POST['brandName'];
        $updateBrand = $brand->update_brand($brandName,$id);
        
    }

?>
<div class="container-fluid">

<div class="container-fluid w-50 text-center">


<?php
                if(isset($updateBrand)){
                    echo $updateBrand;
                }
                ?>
                <?php
                    $get_brand_name = $brand->getbrandbyId($id);
                    if($get_brand_name){
                        while($result = $get_brand_name->fetch_assoc()){
                       
                ?>
    <form method="POST" action="">
       
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
                                        <input type="text" value="<?php echo $result['brandName'] ?>" name="brandName" placeholder="Sửa thương hiệu sản phẩm..." class="medium" autofocus>
                                    </div>
                                </div>
                               
                            </div>
                            <div>
                                
                            </div>
                            <input  type="submit" name="submit" Value="Update"     class="btn btn-primary btn-block btn-lg"/>
                          
    </form>
    
    <?php
                }
            }
                

                ?><br>

  
    
   
</div>
</div>
   
          