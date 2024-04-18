
<?php include 'inc/header.php';

?>
<?php include '../classes/blog.php';?>
<?php
    $bl = new blog();

    if(!isset($_GET['id']) || $_GET['id']==NULL){
       echo "<script>window.location ='Bloglist.php'</script>";
    }else{
         $id = $_GET['id']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updateblog = $bl ->update_blog($_POST,$_FILES, $id);
        
    }
?>

<div class="container-fluid border-danger" style="with: 100px;">

      
<?php
$getblogbyId = $bl->getblogbyId($id);
if($getblogbyId){
while($result_product = $getblogbyId->fetch_assoc()){
?>     

                    <form method="POST" enctype="multipart/form-data" action="">
                     
                        <div class="form-group">
                            <h4 class="h3 mb-2 text-gray-800 text-center"> Sửa Blogs</h4>
                           
                            <div class="alert alert-danger">
                            
                            </div>
                          
                            <h5 class="m-0 font-weight-bold text-primary pb-2">THÔNG TIN BLOGS</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group pb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Tên Blogs</span>
                                        </div>
                                        <input type="text" class="form-control" title="Tên phim bằng tiếng Việt" value="<?php echo $result_product['name'] ?>" name="name" autofocus>
                                    </div>
                                </div>
                               
                            </div>
                            <div>
                
                            </div>
                         
                            <div class="pb-3">
                           
                            </div>
                         
                            <div class="pb-3">
                                <div class="custom-file">
                                    <input type="file" name="image"  class="uploadimg custom-file-input" >
                                    <label class="custom-file-label" class="uploadimg" >Chọn Poster...</label>
                                </div>
                           
                            
                          
                            <div class="grid-width-100">
				<div >
                    <br>
					<textarea style="resize: none" rows="8" class="form-control"  <?php echo $result_product['product_desc'] ?> name="product_desc"  id="editor" placeholder="Nội dung sản phẩm"></textarea>
				</div>
			</div>
  
                        </div>
                        <input  type="submit" name="submit" Value="Thêm Sản Phẩm"   class="btn btn-primary btn-block btn-lg"/>
                    </form>
                    
                    
                    <?php



}}
?>                    <br>
                </div>
                          
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