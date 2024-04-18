<?php include './inc/header.php';?>

<?php include '../classes/brand.php' ?>
<?php
    $brand = new brand();
     if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delbrand = $brand->del_brand($id);
    }
?>
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">QUẢN LÝ THỂ LOẠI</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    DANH SÁCH THỂ LOẠI
                    <a href="brandadd.php" class="btn btn-success float-right">Thêm thể loại</a>
                </div>
            </div>
           
            <div class="alert alert-" style="border-radius:0px;">
               
            </div>
       
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center" id="dataTable"
                        width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:3em;">STT</th>
                                <th>Tên thể loại</th>
                                <th style="width:3em;">Sửa</th>
                                <th style="width:3em;">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
						$show_brand = $brand->show_brand();
						if($show_brand){
							$i = 0;
							while($result = $show_brand->fetch_assoc()){
								$i++;
							
					?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['brandName'] ?></td>
                                <td><a href="brandedit.php?brandid=<?php echo $result['brandId'] ?>"><i
                                            class="far fa-edit fa-lg"></i></a></td>
                                <td><a  onclick = "return confirm('Are you want to delete?')" href="?delid=<?php echo $result['brandId'] ?>" data-toggle="confirm"
                                    role="button"><i class="far fa-trash-alt fa-lg text-danger"></i></a></td>
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