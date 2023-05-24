<?php
session_start();
require '../login_check.php';
require '../db_connect.php';
require '../dash_header.php';


$id= $_SESSION["id"];
$select = "SELECT * FROM users WHERE id != $id";
$users_list =mysqli_query($db_connect, $select);

?>


<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
        <div class="col-lg-12">
        <div class="card">
          <div class="card-header text-center">
            <h2>Users Info</h2>
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
              <tr>
                <th >SL</th>
                <th >NAME</th>
                <th >EMAIL</th>
                <th class="text-center" >ACTION</th>
              </tr>
              <?php foreach($users_list as $key=>$users){?>
              <tr>
                <td text-center"><?=$key +1?></td>
                <td ><?=$users['name']?></td>
                <td ><?=$users['email']?></td>
                <td class="d-flex justify-content-center">
                  <a href="delete_user.php?id=<?=$users['id']?>" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              <?php }?>
            </table>
          </div>
        </div>
      </div>
				</div>
      </div>
    </div>



<?php
require "../dash_footer.php";
?>