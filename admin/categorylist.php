<?php include './inc/header.php';?>

<?php include '../classes/category.php' ?>
<?php
    $cat = new category();
     if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delcat = $cat->del_category($id);
    }
?>
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">QUẢN LÝ DANH MỤC</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    DANH SÁCH DANH MỤC
                    <a href="categoryadd.php" class="btn btn-success float-right">Thêm Danh Mục</a>
                </div>
            </div>
           
            <div class="alert alert-" style="border-radius:0px;">
               <?php
                 if(isset($delcat)){
                        echo $delcat;
                 }
               ?>
            </div>
       
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center" id="dataTable"
                        width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:3em;">STT</th>
                                <th>Tên danh mục</th>
                                <th style="width:3em;">Sửa</th>
                                <th style="width:3em;">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
						  $show_cate = $cat->show_category();
						   if($show_cate){
							$i = 0;
							while($result = $show_cate->fetch_assoc()){
								$i++;
							
					       ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['catName'] ?></td>
                                <td><a href="categoryedit.php?catid=<?php echo $result['catId'] ?>"><i
                                            class="far fa-edit fa-lg"></i></a></td>
                                <td><a onclick = "return confirm('Are you want to delete?')" href="?delid=<?php echo $result['catId'] ?>">Delete</a></td>
                            </tr>
                            <?php
                            }
						}
						?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>