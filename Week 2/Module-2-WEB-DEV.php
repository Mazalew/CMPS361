<!DOCTPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://WWW.w3/org/TR/html4/loose.dtd">

<html>

<head>
  <title>Database Login Screen</title>
  <meta http-equiv="Content-Type" content="text/html; charset=">
  <link rel="stylesheet" type="text/css" href="CSS/Styles_W2.css">
</head>
<body>

<div id="NavBar" hidden>
  <form id=Select-Rows>
    <legend> Which rows do you want to see </legend>
  </form>
</div>
</br>
</br>
 <?php
$servername = "localhost";
$username = "root";
$password = "IT@Cl@rk";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM ap.invoices";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo "<table>";
  echo "<tr>";
  echo "<th> ID </th>";
  echo "<th> Vendor ID </th>";
  echo "<th> Invoice Number </th>";
  echo "<th> Invoice Date </th>";
  echo "<th> Invoice Total </th>";
  echo "<th> Payment Total </th>";
  echo "<th> Credit Total </th>";
  echo "<th> Terms </th>";
  echo "<th> Invoice Due Date </th>";
  echo "<th> Payment Date </th>";
  echo "</tr>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["invoice_id"]. "</td>";
    echo "<td>" . $row["vendor_id"] . "</td>";
    echo "<td>" . $row["invoice_number"] . "</td>";
    echo "<td>" . $row["invoice_date"] . "</td>";
    echo "<td>" . $row["invoice_total"] . "</td>";
    echo "<td>" . $row["payment_total"] . "</td>";
    echo "<td>" . $row["credit_total"] . "</td>";
    echo "<td>" . $row["terms_id"] . "</td>";
    echo "<td>" . $row["invoice_due_date"] . "</td>";
    echo "<td>" . $row["payment_date"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}


mysqli_close($conn);
?>
</body>
</html>
