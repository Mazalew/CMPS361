<!DOCTPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://WWW.w3/org/TR/html4/loose.dtd">

<html>

<head>
  <title>Database Login Screen</title>
  <meta http-equiv="Content-Type" content="text/html; charset=">
</head>
<body>

<?php
require("MyConnectionMysql.php");
require("MyCodeMysql.php");

$obj = new MyConnectionMysql();
$obj->setHost('localhost');
$obj->setUser('root');
$obj->setPsw('Your password here');  //Enter your password here
$obj->setDb('Your database here');  //Enter your database here
$obj->setSchema('Your schema here');  //Enter your schema here
$obj->setConn();
$obj->displayValues();
$qObj = new MyCodeMysql();
$qObj->setConn($obj->getConn());
$q = "SELECT *
  FROM tester";
$qObj->setQuery($q);
$qObj->displayTable();
echo("<br><br>");
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
