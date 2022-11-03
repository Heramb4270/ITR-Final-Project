<?php 
 	include "config.php";

 	if (isset($_GET['ID'])) 
 	{

 		$delete = mysqli_query($conn,"delete from contact where id='".$_GET['ID']."'");

 		if ($delete) 				
		{
			echo "<script>;";
			echo "alert('Record Delete....!');";
			echo 'window.location.href = "index.php";';
			echo "</script>;";
		}
		else
		{
			echo "<script>;";
			echo "alert('Data error....!');";
			echo 'window.location.href = "index1.php";';
			echo "</script>;";
		}
 	}

  ?>