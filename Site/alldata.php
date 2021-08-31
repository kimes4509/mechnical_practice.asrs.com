<?php 
    include('db_conn.php');
	// write query for package
	$sql = 'SELECT Code, Name, Firm FROM wine ';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$wine = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>
<body class="">
	
	<table style="border:3px #cccccc solid ;">
		<center><p 
			class="container white-text"
			style="font-size:48px;" 
			> <font face=  'Noto Serif TC', serif;> All Data Information</p> </font></center>
	

  <tr>

  	<!--table title-->
  	<th>Code</th>
    <th>Name</th>
    <th>Firm</th>
  </tr>
<?php
foreach ($wine as $pizza ) {?>
	<!--get data from database-->
	<tr>
    <td><?php echo htmlspecialchars($pizza['Code']); ?></td>
    <td><?php echo htmlspecialchars($pizza['Name']); ?></td>
    <td><?php echo htmlspecialchars($pizza['Firm']); ?></td>
  </tr>
<?php }?>
  
</table>

<p>&nbsp;</p>
</body>
	
	<?php include('templates/footer.php'); ?>

</html>