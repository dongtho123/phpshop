
<?php include 'inc/header.php';

?>
<?php include '../classes/blog.php';?>
<?php
	$class = new blog();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insert_blogs = $class->insert_blogs($_POST,$_FILES);
     	
	}
?>
<div class="container-fluid border-danger" style="with: 100px;">
                    <form method="POST" enctype="multipart/form-data" action="">
                     
                        <div class="form-group">
                            <h4 class="h3 mb-2 text-gray-800 text-center">Thêm Blogs</h4>
                           
                            <div class="alert alert-danger">
                            <span><?php
                                        
                                        if(isset($insert_blogs)){
                                         echo $insert_blogs;
                                            }
                                       ?></span>
                            </div>
                           
                            <h5 class="m-0 font-weight-bold text-primary pb-2">THÔNG TIN BLOGS</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group pb-3">


                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Tên Blogs</span>
                                        </div>
                                        <input type="text" class="form-control" title="Tên phim bằng tiếng Việt" name="name" autofocus>
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
					<textarea style="resize: none" rows="8" class="form-control" name="product_desc"  id="editor" placeholder="Nội dung sản phẩm"></textarea>
				</div>
			</div>
  
                        </div>
                        <input  type="submit" name="submit" Value="Thêm Sản Phẩm"   class="btn btn-primary btn-block btn-lg"/>
                    </form><br>
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