<?php
  require "../dash_header.php";
?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6">
						<div class="card">
              <div class="card-header">
                <h2>Profiel Upload</h2>
              </div>
              <div class="card-body">
                <?php if(isset( $_SESSION["update"])){?>
                  <div class="alert alert-success"><?= $_SESSION["update"]?></div>
                <?php } unset( $_SESSION["update"]);?>
                <form method="POST" action="profiel_post.php">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="hidden" class="form-control" id="exampleInputEmail1" name="user_id" value="<?= $user_assoc['id'] ?>">
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?= $user_assoc['name'] ?>">
                  </div>
                  
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Old Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="old_password">
                    <?php if(isset( $_SESSION["wrong_pass"])){?>
                       <div class="alert alert-danger mt-2"><?= $_SESSION["wrong_pass"]?></div>
                    <?php } unset( $_SESSION["wrong_pass"]);?>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="password">
                    
                  </div>


                 
                  
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
					</div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h2>Profile Photo Update</h2>
              </div>
              <div class="card-body">

              <?php if(isset( $_SESSION["photo_select_err"])){?>
                  <div class="alert alert-danger mb-3"><?= $_SESSION["photo_select_err"]?></div>
                <?php } unset( $_SESSION["photo_select_err"]);?>
                
              <?php if(isset( $_SESSION["ext_err"])){?>
                  <div class="alert alert-danger mb-3"><?= $_SESSION["ext_err"]?></div>
                <?php } unset( $_SESSION["ext_err"]);?>

              <?php if(isset( $_SESSION["size_err"])){?>
                  <div class="alert alert-danger mb-3"><?= $_SESSION["size_err"]?></div>
                <?php } unset( $_SESSION["size_err"]);?>


                <form action="profile_photo.php" enctype="multipart/form-data">
                  <div class="mb-3">
                    <input type="file" name="photo" class="form-control">
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
                
              </div>
            </div>
          </div>
				</div>
      </div>
    </div>
        <!--**********************************
            Content body end
        ***********************************-->



<?php
  require "../dash_footer.php";
?>