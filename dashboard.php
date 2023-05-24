<?php
session_start();
require "login_check.php";
require "db_connect.php";
require "dash_header.php";

?>

		
		<!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="dash_header">
                            <h2>Welcome to Dashboard</h2>
                        </div>
					</div>
				</div>
      </div>
    </div>
        <!--**********************************
            Content body end
        ***********************************-->
<?php
require "dash_footer.php"
?>