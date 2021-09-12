<!DOCTPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://WWW.w3/org/TR/html4/loose.dtd">

<html>

<head>
  <title>Database Login Screen</title>
  <meta http-equiv="Content-Type" content="text/html; charset=">
</head>
<body>

<?php
$obj = new MyConnectionMysql();
$obj->setHost('mazalew.it.pointpark.edu');
$obj->setUser('root');
$obj->setPsw('');
$obj->setDb('ap');
$obj->setSchema('ap');
$obj->setConn();
$obj->displayValues();
 ?>
