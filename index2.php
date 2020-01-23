<?php  
	require "Classes/PHPExcel/IOFactory.php";
	// mysql database connection
	$server_name = "localhost";
	$user_name = "root";
	$user_pass = "";
	$dbname = "tcgtester";
	// mysql insert

	if(isset($_POST['submit']))
	{
		$inputFilename = $_FILES['filename']['tmp_name'];
		$exceldata = array();

		$conn = mysqli_connect($server_name,$user_name,$user_pass,$dbname);

		if(!$conn)
		{
			die("Connection Error : ".mysqli_connect_error());
		}

		try
		{
			$inputfiletype = PHPExcel_IOFactory::identify($inputFilename);
			$objReader = PHPExcel_IOFactory::createReader($inputfiletype);
			$objPHPExcel = $objReader->load($inputFilename);
		}
		catch(Exception $e)
		{
			die('Error "'.pathinfo($inputFilename,PATHINFO_BASENAME).'" :'.$e->getMessage());
		}

		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		for($row = 1; $row <= $highestRow; $row++){
			$rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
			// `card_name`, `card_set_code`, `card_set`, `card_roll_id`, `type_of_card`, `power`, `toughness`, `loyalty`, `manacost`, `converted_manacost`, `ability`
			$sql = "INSERT INTO `card_details`(`card_name`, `card_set_code`, `card_set`, `card_roll_id`, `type_of_card`, `power`, `toughness`, `loyalty`, `manacost`, `converted_manacost`, `ability`) VALUES ('".$rowData[0][0]."','".htmlspecialchars(mysqli_real_escape_string($conn,$rowData[0][1]))."','".htmlspecialchars(mysqli_real_escape_string($conn,$rowData[0][2]))."','".htmlspecialchars(mysqli_real_escape_string($conn,$rowData[0][3]))."','".htmlspecialchars(mysqli_real_escape_string($conn,$rowData[0][4]))."','".htmlspecialchars(mysqli_real_escape_string($conn,$rowData[0][5]))."','".htmlspecialchars(mysqli_real_escape_string($conn,$rowData[0][6]))."','".htmlspecialchars(mysqli_real_escape_string($conn,$rowData[0][7]))."','".htmlspecialchars(mysqli_real_escape_string($conn,$rowData[0][8]))."','".htmlspecialchars(mysqli_real_escape_string($conn,$rowData[0][9]))."','".htmlspecialchars(mysqli_real_escape_string($conn,$rowData[0][10]))."') ";
			if(mysqli_query($conn,$sql)){

			}
			else
			{
				echo mysqli_error($conn);
			}
		}
	}

?>

<div>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="filename" >
		<input type="submit" name="submit" value="go">
	</form>
</div>