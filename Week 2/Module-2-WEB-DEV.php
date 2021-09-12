<!DOCTPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://WWW.w3/org/TR/html4/loose.dtd">

<html>

<head>
  <title>Database Login Screen</title>
  <meta http-equiv="Content-Type" content="text/html; charset=">
</head>
<body>

 <?php
$servername = "localhost";
$username = "root";
$password = "IT@Cl@rk";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password , $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$sql = "SELECT id FROM tester";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo "<br>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?> 
 <style>
 body {background-color: powderblue;}
 h1   {color: blue;}

tbody tr:nth-child(odd) {
     background-color: yellow;
}
</style>
</body>
</html>
