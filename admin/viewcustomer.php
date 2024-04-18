<?php include './inc/header.php';?>
<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/customer.php');
include_once ($filepath.'/../helpers/format.php');

 ?>
<?php
   
    if(!isset($_GET['customerid']) || $_GET['customerid']==NULL){
       echo "<script>window.location ='inbox.php'</script>";
    }else{
         $id = $_GET['customerid']; 
    }
     $cs = new customer();
  

?>

<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">View Customer</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                View Customer
                 
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
                               
                              
                                <th >Name</th>
                                <th >Phone</th>
                                <th >Email</th>
                                <th >City</th>
                                <th >Address</th>
                                <th >Country</th>
                                <th>Zipcode</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                    $get_customer = $cs->show_customers($id);
                    if($get_customer){

                    
                        while($result = $get_customer->fetch_assoc()){
                       
                ?>
                            <tr>
                                <td><?php echo $result['name'] ?></td>
                                <td><?php echo $result['phone'] ?></td>
                                <td><?php echo $result['email'] ?></td>
                                <td><?php echo $result['city'] ?></td>
                                <td><?php echo $result['country'] ?></td>
                                <td><?php echo $result['address'] ?></td>

                                <td><?php echo $result['zipcode'] ?></td>
                              
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