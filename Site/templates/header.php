<!--upper links-->
<?php
  session_start();
?>
<head>
	<title>ASRS CONTROL</title>
	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@1,700&family=Volkhov:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Noto+Serif+TC:wght@600&display=swap" rel="stylesheet">

  <style type="text/css">

    .text-gradient {
  background: linear-gradient(to left, violet, #039be5 , green, yellow, orange, red);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  display: inline-block;
  }
  	form{
  		max-width: 1000px;
  		margin: 20px auto;
  		padding: 200px;
      font-family: 'Philosopher', sans-serif;
      font-family: 'Volkhov', serif;
  	}
    table{
      width: 900px;
      border: 10px ;
      align-items: center;
      margin: 20px auto;
      font-family: 'Gelasio', serif;
      color: white;
    }
    
    th{
      border: solid 2px #455a64;
      text-align: center;
      background-color: #b0bec5;
      color: black;
      font-size: 20px;
    }
    td{
      border: solid 2px #455a64;
      text-align: center;
      color: black;
      background-color:white ;
      font-family: 'Noto Serif TC', serif;

    }
  </style>
</head>
<body style="background-image: linear-gradient(to right, #434343 0%, black 100%);">
	<nav style="background-image: linear-gradient(to right, #434343 0%, black 100%);">
    <div class="container">
      <!--cover link-->
      <a href="cover.php" class="brand-logo text-gradient">ASRS CONTROL CENTER</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
       


        <?php
          if(isset($_SESSION["useruid"]))
          {
            ?>
            <li><a href="add.php" >New Data</a></li>
            <li><a href="alldata.php">All Data</a></li>
            <li><a href="index_Scan.php" >Scan</a></li>
            <li><a href="index_Search.php" >Search</a></li>
            <li><a href='includes/logout.inc.php' >Log out</a></li>
            <?php
          }
          else
          {
            ?>
            <li><a href="login.php" >Log in</a></li>
            <!-- li><a href="signup.php" class="btn brand z-depth-0">Sign up</a></li>; -->
            <?php
          }
        ?>
      

      </ul>
    </div>
  </nav>
