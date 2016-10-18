<!DOCTYPE html>

<html>

<head>

  <link rel="stylesheet" type="text/css" href="stylesheet.css">

  <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

  <script src="app.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <title>SK8M8</title>

  <script type="text/javascript">
var totalCount = 8;
function ChangeIt()
{
var num = Math.ceil( Math.random() * totalCount );
document.body.background = 'bgimages/'+num+'.jpg';
document.body.style.backgroundRepeat = "repeat";// Background repeat
}
</script>

</head>

<body>

  <br><h1>SK8M8</h1>

  <br><br><div id="box" class="mainButtons">Begin Session

  	<p id></p>
  </div>
  <div id="photonDiv">
  <div id="info">
  	<p id="infoText">To begin hit Start and wait for your Photon to light up. You then have 6 seconds to perform one, two or three ollies. </p> </br>
  	<p id="infoText2"></p>
  	<div id="submitDiv">
  		<form method="post" id="reg-form" autocomplete="off">
			
	<div class="form-group">
	<input type="text" class="form-control" name="txt_fname" id="name" placeholder="Name" required />
	</div>

  <div class="form-group">
  <input type="hidden" class="form-control" name="txt_time" id="time" required />
  </div>

				
	<hr />
				
	<div class="form-group">
	<button class="btn btn-primary">Submit</button>
	</div>
				
    </form> 
  	</div>
  </div>
  <div id="startPhoton" class="buttons">Start</div>
  </div>
  <div id="history" class="mainButtons">History</div>
  <div id="historyDiv">
    <?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbsk8m8";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT username, airtime FROM dbsk8m8table ORDER BY airtime DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><td>Username</td><td>Airtime</td></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><th>".$row["username"]."</th> <th>".$row["airtime"]."</th></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>
  </div>
  <div id="about" class="mainButtons">About</div>
  <div id="aboutDiv">
  	<p id="aboutText">Blah blah blah</p>
  </div>

</body>

<script type="text/javascript">
ChangeIt();
</script>

</html>
