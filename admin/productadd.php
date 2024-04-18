
<?php include 'inc/header.php';

?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>

<?php
    $pd = new product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $insertProduct = $pd->insert_product($_POST,$_FILES);
        
    }
?>

<div class="container-fluid border-danger" style="with: 100px;">
                    <form method="POST" enctype="multipart/form-data" action="">
                     
                        <div class="form-group">
                            <h4 class="h3 mb-2 text-gray-800 text-center">THÊM SẢN PHẨM</h4>
                           
                            <div class="alert alert-danger">
                            <?php

                           if(isset($insertProduct)){
                           echo $insertProduct;
                           }

                            ?>      
                            </div>
                          
                            <h5 class="m-0 font-weight-bold text-primary pb-2">THÔNG TIN SẢN PHẨM</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group pb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Tên Sản Phẩm</span>
                                        </div>
                                        <input type="text" class="form-control" title="Tên phim bằng tiếng Việt" name="productName" autofocus>
                                    </div>
                                </div>
                               
                            </div>
                            <div>
                
                            </div>
                         
                            <div class="pb-3">
                           
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

                                                           <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>

                                                            <?php
                                                              }
                                                              }
                                                 ?>
                                                           
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
                                                           
                                                            <option>--------Select Brand-------</option>

                                                               <?php
                                                               $brand = new brand();
                                                               $brandlist = $brand->show_brand();

                                                                 if($brandlist){
                                                                 while($result = $brandlist->fetch_assoc()){
                                                                 ?>

                                                                <option value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>

                                                                 <?php
                                                                      }
                                                                  }
                                                            ?>

                                                           
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
                                                           
                                                            <option value="0">Featured</option>
                                                            <option value="1">Non-Featured</option>
                                                           
                                                        </select>
                                                   </span>
                                                </div>
                                               
                                            </div>
                                        </div>
                                      </div>
                                       
                                    </div>
                                </div>
                                
                            </div>
                          
                                                                </br>
                            <div class="input-group pb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text admin_add_movie_title"> img</span>
                                </div>
                                <input type="text" class="form-control" name="price" >
                            </div>
                            <div class="pb-3">
                                <div class="custom-file">
                                    <input type="file" name="image"  class="uploadimg custom-file-input" >
                                    <label class="custom-file-label" class="uploadimg" >Chọn Poster...</label>
                                </div>
                           
                            
                            <h5 class="m-0 font-weight-bold text-primary pb-2">Descriptions</h5>
                          
                            <textarea style="resize: none" rows="8" class="form-control" name="product_desc"  id="editor" placeholder="Nội dung sản phẩm"></textarea>
                                                         
<script>
	   tinymce.init({
            selector:'#editor',
            menubar: false,
            statusbar: false,
            plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ',
            skin: 'bootstrap',
            toolbar_drawer: 'floating',
            min_height: 200,           
            autoresize_bottom_margin: 16,
            setup: (editor) => {
                editor.on('init', () => {
                    editor.getContainer().style.transition="border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
                });
                editor.on('focus', () => {
                    editor.getContainer().style.boxShadow="0 0 0 .2rem rgba(0, 123, 255, .25)",
                    editor.getContainer().style.borderColor="#80bdff"
                });
                editor.on('blur', () => {
                    editor.getContainer().style.boxShadow="",
                    editor.getContainer().style.borderColor=""
                });
            }
        });
</script>
                        </div>
                        <input  type="submit" name="submit" Value="Thêm Sản Phẩm"   class="btn btn-primary btn-block btn-lg"/>
                    </form><br>
                </div>