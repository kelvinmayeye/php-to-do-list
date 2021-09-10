<?php
	include 'conn.php';
	$obj=new Database();
	// extract($_POST);

	if(isset($_POST['insert'])){
		$thetask = $_POST['task'];

	if($obj->saveRecords($thetask))  
      {  
           echo "<script>alert('Task Added');</script>";
			echo "<script>window.location.href='index.php'</script>";
      }else{
      		echo "not sent";
      }
  }

  	if(isset($_POST['remove'])){
  		echo "<script>alert('Hellow am bout to do something');</script>";
  	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>The simple Todo List</title>
	<!--Bootstrap css-->
	<link rel="stylesheet" href="bootstrap-4.6.0/dist/css/bootstrap.min.css">
	<script src="jquery-3.5.1.min.js"></script>
	<script src="bootstrap-4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="main_bd">
		<form action="" method="POST">
		<div class="row justify-content-center pt-5">
			<div class="header-card">
				<h2>To Do list the list</h2>
				<a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">Add Task</a>&nbsp;&nbsp;&nbsp;
				<button type="submit" class="btn btn-danger" name="remove">Remove Task</button>&nbsp;&nbsp;&nbsp;
				<button type="submit" class="btn btn-success" name="delete">Edit Task</button>
				<?php $obj->selectData(); ?>
			</div>
		</div>

		<!-- Modal HTML -->
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <!-- Form tag here -->
            	<div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Your Task</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="form-outline"><input type="text" name="task" id="form1" class="form-control"data-mdb-showcounter="true" maxlength="20"/>
  				  <label class="form-label" for="form1">Write your Task</label>
  				  <div class="form-helper"></div>
				 </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" name="insert">Add</button>
                </div>
            </div>
            </form>
        </div>
    </div>
	</div>

</body>
</html>