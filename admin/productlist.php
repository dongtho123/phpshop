
<?php include 'inc/header.php';

?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>


<?php
    $pd = new product();

    $fm = new Format();
	if(isset($_GET['productid'])){
        $id = $_GET['productid']; 
        $delpro = $pd->del_product($id);
    }
?>
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">QUẢN LÝ SẢN PHẨM</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    DANH SÁCH SẢN PHẨM
                    <a href="productadd.php" class="btn btn-success float-right">Thêm Sản Phẩm</a>
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
                                <th>Tên</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Danh Mục</th>
                               
                                <th>Thương Hiệu</th>
                                <th>Descs</th>
                                <th>Type</th>
                                <th style="width:3em;">Sửa</th>
                                <th style="width:3em;">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
						$show_product = $pd->show_product();
						if($show_product){
							$i = 0;
							while($result = $show_product->fetch_assoc()){
								$i++;
							
					?>
                            <tr>
                            <td><?php echo $i ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['price'] ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
				
                        <td><?php echo $result['product_desc'] ?></td>
			         <td> <?php 
						if($result['type']==0){
							echo 'Feathered';
						}else{
							echo 'Non-Feathered';
						}

					?></td>
				 
				
					
					<td><a href="productedit.php?productid=<?php echo $result['productId'] ?>"><i
                                            class="far fa-edit fa-lg"></i></a> </td>
                     <td> <a href="?productid=<?php echo $result['productId'] ?>"><i class="far fa-trash-alt fa-lg text-danger"></i></a></td>
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