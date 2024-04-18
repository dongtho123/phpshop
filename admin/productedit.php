
<?php include 'inc/header.php';

?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php
    $pd = new product();

    if(!isset($_GET['productid']) || $_GET['productid']==NULL){
       echo "<script>window.location ='productlist.php'</script>";
    }else{
         $id = $_GET['productid']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updateProduct = $pd->update_product($_POST,$_FILES, $id);
        
    }
?>

<div class="container-fluid border-danger" style="with: 100px;">
<?php

if(isset($updateProduct)){
    echo $updateProduct;
}

?>        
<?php
$get_product_by_id = $pd->getproductbyId($id);
if($get_product_by_id){
while($result_product = $get_product_by_id->fetch_assoc()){
?>     
                    <form method="POST" enctype="multipart/form-data" action="">
                     <br>
                     
                        <div class="form-group">
                            <h4 class="h3 mb-2 text-gray-800 text-center">SỬA SẢN PHẨM</h4>
                           
                           
                          
                            <h5 class="m-0 font-weight-bold text-primary pb-2">THÔNG TIN SẢN PHẨM</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group pb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Tên Sản Phẩm</span>
                                        </div>
                                        <input type="text"  name="productName" value="<?php echo  $result_product['productName']?>" class="medium"  class="form-control"autofocus>
                                    </div>
                                </div>
                               
                            </div>
                            <div>
                
                            </div>
                         
                            <div class="pb-3">
                                <div class="custom-file">
                                <img src="uploads/<?php echo $result_product['image'] ?>" width="90"><br>
                                 
                                    <input type="file" name="image" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group pb-12">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">category</span>
                                                    <span>  
                               <select class="input-group pb-3" required name="category" data-toggle="movie-dropdown" oninvalid="this.setCustomValidity('Có phải bạn có quên chọn gì đó?')" onchange="this.setCustomValidity('')">
                                <option value="" data-display="Thể Loại">Chưa chọn...</option>
                             <?php
                            $cat = new category();
                            $catlist = $cat->show_category();

                            if($catlist){
                                while($result = $catlist->fetch_assoc()){
                             ?>

                             <option 
                             <?php
                            if($result['catId']==$result_product['catId']){ echo 'selected';  }
                            ?>
                             value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
                             <?php
                                  }
                              }
                           ?>>
                                                                
                              </option>
                                                           
                             </select>
                              </span>
                              </div>
                                               
                               </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group pb-6">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Brand</span>
                                                    <span>  
                                                        <select class="input-group pb-3" required name="brand" data-toggle="movie-dropdown" oninvalid="this.setCustomValidity('Có phải bạn có quên chọn gì đó?')" onchange="this.setCustomValidity('')">
                                                            <option value="" data-display="Thể Loại">Chưa chọn...</option>
                                                            <?php
                            $brand = new brand();
                            $brandlist = $brand->show_brand();

                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
                             ?>

                                                            <option  <?php
                            if($result['brandId']==$result_product['brandId']){ echo 'selected';  }
                            ?>

                             value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>

                               <?php
                                  }
                              }
                           ?>></option>
                                                           
                                                        </select>
                                                   </span>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group pb-6">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Product Type</span>
                                                    <span>  
                                                        <select class="input-group pb-3" required name="type" data-toggle="movie-dropdown" oninvalid="this.setCustomValidity('Có phải bạn có quên chọn gì đó?')" onchange="this.setCustomValidity('')">
                                                            <option value="" data-display="Thể Loại">Chưa chọn...</option>
                                                           
                                                            <option>Select Type</option>
                            <?php
                            if($result_product['type']==0){
                            ?>
                            <option selected value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                            <?php
                        }else{
                            ?>
                            <option value="0">Featured</option>
                            <option selected value="1">Non-Featured</option>
                            <?php
                            }
                            ?>
                                                           
                                                        </select>
                                                   </span>
                                                </div>
                                               
                                            </div>
                                        </div>
                                      </div>
                                       
                                    </div>
                                </div>
                               
                            <div class="input-group pb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text admin_add_movie_title">Price</span>
                                </div>
                                  <input type="text" value="<?php echo $result_product['price'] ?>" name="price"  />
                            </div>
                            
                           
                            
                            <h5 class="m-0 font-weight-bold text-primary pb-2">Descriptions</h5>
                            <textarea class="ckeditor" style="resize:none;" name="product_desc" id="editor" cols="120"
                                rows="5"><?php echo $result_product['product_desc'] ?></textarea>
                            <script>
                                var editor = CKEDITOR.replace( 'editor',{
                                    language:'vi',
                                    height:'25em',
                                    width: '100%',
                                    placeholder: 'Nội dung phim'
                                } );
                                editor.config.removePlugins = 'resize';
                                CKFinder.setupCKEditor( editor );
                                CKFinder.widget( 'ckfinder-widget', {
                                id: 'custom-instance-id',
                                thumbnailDefaultSize: 400
                            } );
                            </script>
                        </div>
                        <input type="submit" name="submit" value="Update"  class="btn btn-primary btn-block btn-lg" />
                    </form>
                    <?php
        }

        }
            ?><br>
                </div>