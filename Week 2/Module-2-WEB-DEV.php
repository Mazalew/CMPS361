<!DOCTPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://WWW.w3/org/TR/html4/loose.dtd">

<html>

<head>
  <title>Database Login Screen</title>
  <meta http-equiv="Content-Type" content="text/html; charset=">
  <link rel="stylesheet" type="text/css" href="CSS/Styles_W2.css">
  <script src="JavaScript/jquery-3.3.1.min.js"></script>
  <script src="JavaScript/JQuery_W2.js"></script>
</head>
<body>

<div id="NavBar">
  <form id=Select-Rows>
    <legend> Which rows do you want to see </legend>
    <div>
      <input type="radio" name="ID" id="SID" value="Show">
      <label for="SID" id="SIDL">Show ID</label>

      <input type="radio" name="ID" id="HID" value="Hide">
      <label for="HID" id="HIDL">Hide ID</label>
    </div>
    <div>
      <input type="radio" name="VID" id="SVendor ID" value="Show">
      <label for="SVendor ID" id="SVendor IDL">Show Vendor ID</label>

      <input type="radio" name="VID" id="HVendor ID" value="Hide">
      <label for="HVendor ID" id="HVendor IDL">Hide Vendor ID</label>
    </div>
    <div>
      <input type="radio" name="Invoice Number" id="SInvoice Number" value="Show">
      <label for="SInvoice Number" id="SInvoice NumberL">Show Invoice Number</label>

      <input type="radio" name="Invoice Number" id="HInvoice Number" value="Hide">
      <label for="HInvoice Number" id="HInvoice NumberL">Hide Invoice Number</label>
    </div>
    <div>
      <input type="radio" name="Invoice Date" id="SInvoice Date" value="Show">
      <label for="SInvoice Date" id="SInvoice DateL">Show Invoice Date</label>

      <input type="radio" name="Invoice Date" id="HInvoice Date" value="Hide">
      <label for="HInvoice Date" id="HInvoice DateL">Hide Invoice Date</label>
    </div>
    <div>
      <input type="radio" name="Invoice Total" id="SInvoice Total" value="Show">
      <label for="SInvoice Total" id="SInvoice TotalL">Show Invoice Total</label>

      <input type="radio" name="Invoice Total" id="HInvoice Total" value="Hide">
      <label for="HInvoice Total" id="HInvoice TotalL">Hide Invoice Total</label>
    </div>
    <div>
      <input type="radio" name="Payment Total" id="SPayment Total" value="Show">
      <label for="SPayment Total" id="SPayment TotalL">Show Payment Total</label>

      <input type="radio" name="Payment Total" id="HPayment Total" value="Hide">
      <label for="HPayment Total" id="HPayment TotalL">Hide Payment Total</label>
    </div>
    <div>
      <input type="radio" name="Credit Total" id="SCredit Total" value="Show">
      <label for="SCredit Total" id="SCredit TotalL">Show Credit Total</label>

      <input type="radio" name="Credit Total" id="HCredit Total" value="Hide">
      <label for="HCredit Total" id="HCredit TotalL">Hide Credit Total</label>
    </div>
    <div>
      <input type="radio" name="Terms" id="STerms" value="Show">
      <label for="STerms" id="STermsL">Show Terms</label>

      <input type="radio" name="Terms" id="HTerms" value="Hide">
      <label for="HTerms" id="HTermsL">Hide Terms</label>
    </div>
    <div>
      <input type="radio" name="Invoice Due Date" id="SInvoice Due Date" value="Show">
      <label for="SInvoice Due Date" id="SInvoice Due DateL">Show Invoice Due Date</label>

      <input type="radio" name="Invoice Due Date" id="HInvoice Due Date" value="Hide">
      <label for="HInvoice Due Date" id="HInvoice Due DateL">Hide Invoice Due Date</label>
    </div>
    <div>
      <input type="radio" name="Payment Date" id="SPayment Date" value="Show">
      <label for="SPayment Date" id="SPayment DateL">Show Payment Date</label>

      <input type="radio" name="Payment Date" id="HPayment Date" value="Hide">
      <label for="HPayment Date" id="HPayment DateL">Hide Payment Date</label>
    </div>
    <div>
      <button type="submit" id="submit">Submit</button>
    </div>
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
  echo "<th id=invoice_id> ID </th>";
  echo "<th id=vendor_id> Vendor ID </th>";
  echo "<th id=invoice_number> Invoice Number </th>";
  echo "<th id=invoice_date> Invoice Date </th>";
  echo "<th id=invoice_total> Invoice Total </th>";
  echo "<th id=payment_total> Payment Total </th>";
  echo "<th id=credit_total> Credit Total </th>";
  echo "<th id=terms_id> Terms </th>";
  echo "<th id=invoice_due_date> Invoice Due Date </th>";
  echo "<th id=payment_date> Payment Date </th>";
  echo "</tr>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td id=invoice_id>" . $row["invoice_id"]. "</td>";
    echo "<td id=vendor_id>" . $row["vendor_id"] . "</td>";
    echo "<td id=invoice_number>" . $row["invoice_number"] . "</td>";
    echo "<td id=invoice_date>" . $row["invoice_date"] . "</td>";
    echo "<td id=invoice_total>" . $row["invoice_total"] . "</td>";
    echo "<td id=payment_total>" . $row["payment_total"] . "</td>";
    echo "<td id=credit_total>" . $row["credit_total"] . "</td>";
    echo "<td id=terms_id>" . $row["terms_id"] . "</td>";
    echo "<td id=invoice_due_date>" . $row["invoice_due_date"] . "</td>";
    echo "<td id=payment_date>" . $row["payment_date"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
echo $_POST['ID'];
mysqli_close($conn);
?>
</body>
</html>
