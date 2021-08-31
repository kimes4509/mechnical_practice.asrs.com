<html>
<?php include('templates/header.php'); ?>
<head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">QRcode Scan</a>
        </nav>
        <div class="row">
            <div class="col-md-6">
                <video id="preview" width="100%"></video>
                <?php
                if(isset($_SESSION['error']))
                {
                    echo "<div class='alert alert-danger'>
                    <h4>Error!</h4>
                    ".$_SESSION['error']."
                    </div>";
                }
                if(isset($_SESSION['success']))
                {
                    echo "<div class='alert alert-success'>
                    <h4>Success</h4>
                    ".$_SESSION['success']."
                    </div>";
                }
                ?>
            </div>
            <div class="col-md-6">
                <form action="insert.php" method="post" class="form-horziontal">
                    <label>SCAN QR CODE</label>
                    <input type="text" name="text" id="text" readonyy="" placeholder="scan qrcode" class="form-control">
                </form>
            </div>    
        </div>
        <div class="row">
                <div class="col-xl-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="center">ID</th>
                			<th class="center">CODE</th>
                			<th class="center">TIMEIN</th>
                            <th class="center">TIMEOUT</th>
                            <th class="center">LOGDATE</th>
                            <th class="center">STATUS</th>
                		</tr>
                	</thead>
                    <tbody>
                        <?php
                		$server="localhost";
                		$username="To";
                		$password="SQL123";
                		$databasename="qrcode";

                		$conn = mysqli_connect($server, $username, $password, $databasename);
                		if(!$conn)
                		{
                			die("Connection failed" .mysqli_connect_erroe());
                		}
                		$sql ="SELECT ID,Code,TIMEIN,TIMEOUT,LOGDATE,STATUS FROM table_attendance WHERE DATE(TIMEIN)=CURDATE()";
                		$query = $conn->query($sql);
                		while($row = $query->fetch_assoc())
                		{
                		?>
                		<tr>
                			<td><?php echo $row['ID'];?></td>
                			<td><?php echo $row['Code'];?></td>
                			<td><?php echo $row['TIMEIN'];?></td>
                            <td><?php echo $row['TIMEOUT'];?></td>
                            <td><?php echo $row['LOGDATE'];?></td>
                            <td><?php echo $row['STATUS'];?></td>
                		</tr>
                		<?php	
                		}
                		?>
                	</tbody>
                </table>
                </div>
        </div>
        </div>
    </div>
    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length > 0 )
            {
                scanner.start(cameras[0]);
            }
            else
            {
                alert('No cameras found');
            }
        }).catch(function(e)
        {
            console.error(e);
        });
        scanner.addListener('scan',function(c)
        {
            document.getElementById('text').value=c;
            document.forms[0].submit();
        });
    </script>
</body>
<?php include('templates/footer.php'); ?>
</html>