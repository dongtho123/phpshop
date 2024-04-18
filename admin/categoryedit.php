<?php include './inc/header.php';?>

<?php include '../classes/category.php' ?>
<?php
   
    if(!isset($_GET['catid']) || $_GET['catid']==NULL){
       echo "<script>window.location ='categorylist.php'</script>";
    }else{
         $id = $_GET['catid']; 
    }
     $cat = new category();
     
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $catName = $_POST['catName'];
        $updateCat = $cat->update_category($catName,$id);
        
    }

?>
<div class="container-fluid">

<div class="container-fluid w-50 text-center">

<form method="POST" action="">
       
       <div class="form-group">
           <h4 class="text-center">SỬA DANH MỤC</h4>
           <span> <?php
                if(isset($updateCat)){
                    echo $updateCat;
                }
                ?>
                <?php
                    $get_cate_name = $cat->getcatbyId($id);
                    if($get_cate_name){
                        while($result = $get_cate_name->fetch_assoc()){
                            
                ?>
           
           <div class="row">
                               <div class="col-md-12">
                                   <div class="input-group pb-3">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text">Sửa Tên  Danh Mục</span>
                                       </div>
                                       <input  value="<?php echo $result['catName'] ?>" name="catName" type="text" class="form-control" title="Tên Danh Mục Sản Phẩm"  name="catName" autofocus>
                                   </div>
                               </div>
                              
                           </div>
                           <div>
                               
                           </div>
                           <input  type="submit" name="submit" Value="UPDATE"   class="btn btn-primary btn-block btn-lg"/>
                           <?php
                }
            }
                

                ?>
                         
   </form><br>
     
    <br>

  
    
   
</div>
</div>
