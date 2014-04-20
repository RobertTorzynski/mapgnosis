<?php
require("dbAssetMapInfo.php");

// Gets data from URL parameters
$id = $_GET['idz'];

// Opens a connection to a MySQL server
$connection = mysql_connect ("localhost", $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Insert new row with user data
$query = sprintf("DELETE FROM assets WHERE id=" . $id);

$result = mysql_query($query);

if (!$result) {
  die('Invalid query: ' . mysql_error());
}  

header("Location:http://www.mapgnosis.com");
?>
<!--//<!DOCTYPE HTML>
//<html>
//
//<head>
//	<title>Deleted!</title>
//	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
//	<meta name="description" content="Delete" />
//	<script type='text/javascript'>
//     self.close();
//</script>
//</head>
//
//<body>
//	Test!
//</body>-->
//
//</html>

