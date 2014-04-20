<?php 
require("dbAssetMapInfo.php");
// start a session ...
session_start();

ini_set( "display_errors", 0); 

$fileDir = "uploads/" ;
$maxsize=2848000; //set the max upload size in bytes

if($HTTP_POST_FILES['upload_file']['type'] == "image/x-png") 
		{ $_SESSION['fileType'] = ".png";
		}
		
if($HTTP_POST_FILES['upload_file']['type'] == "image/png") 
		{ $_SESSION['fileType'] = ".png";
		}
			
if  ($HTTP_POST_FILES['upload_file']['type'] == "image/jpeg") 
    { $_SESSION['fileType'] = ".jpg";
    }

if  ($HTTP_POST_FILES['upload_file']['type'] == "image/pjpeg") 
    { $_SESSION['fileType'] = ".jpg";
    }
    
if (!$HTTP_POST_VARS['submit']) {
//print_r($HTTP_POST_FILES);
//assigning $error will cause the rest of the processing to be skipped
//and the upload form to display
$_SESSION['idz'] = $_GET['idz'];  
$error=" ";		
}  // end if not yet submitted

//checks for upload errors
if (!is_uploaded_file($HTTP_POST_FILES['upload_file']['tmp_name']) AND
!isset($error)) {
$error = "<b>You must upload a file!</b><br /><br />";
unlink($HTTP_POST_FILES['upload_file']['tmp_name']);
}     

// checks filesize errors
if ($HTTP_POST_FILES['upload_file']['size'] > $maxsize AND !isset($error)) {
$error = "<b>Error, file must be less than $maxsize bytes.</b><br /><br />";
unlink($HTTP_POST_FILES['upload_file']['tmp_name']);
} 


//checks for filetype errors	
if($HTTP_POST_FILES['upload_file']['type'] != "image/x-png" AND
$HTTP_POST_FILES['upload_file']['type'] != "image/png" AND
$HTTP_POST_FILES['upload_file']['type'] != "image/jpeg" AND
$HTTP_POST_FILES['upload_file']['type'] !="image/pjpeg" AND !isset($error)) {
$error = "<b>You may only upload .jpg, or .png files.</b><br /><br />";
unlink($HTTP_POST_FILES['upload_file']['tmp_name']);
}

if (!isset($error)) { 
	
 
    

move_uploaded_file($HTTP_POST_FILES['upload_file']['tmp_name'], $fileDir . $_SESSION['idz'] . $_SESSION['fileType']);  
	



//print "<img src= 'http://assets.zgroks.com/" . $fileDir . $_SESSION['idz'] . $_SESSION['fileType'] . "'/><br>";
//print "<h3>Thank you for your upload. </h3>File was saved as: http://assets.zgroks.com/uploads/" . $_SESSION['idz'] . $_SESSION['fileType'] . ". <br>Future uploads linked to id# " . $_SESSION['idz'] . " will overwrite this image.<h3>Please close this window to continue."; 

header("Location: http://assets.zgroks.com?idz=" . $_SESSION['idz']); /* Redirect browser */
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
// update row with user-added data
$query = sprintf("UPDATE assets SET imageAddress ='%s' WHERE id ='%s'" , mysql_real_escape_string($_SESSION['idz']) . mysql_real_escape_string($_SESSION['fileType']), mysql_real_escape_string($_SESSION['idz']));
$result = mysql_query($query);


if (!$result) {
  die('Invalid query: ' . mysql_error());
}   
exit();




} // end if (!isset($error) //

else
{
echo ("$error");
}
?>                     
<!DOCTYPE html>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<head></head>
<body>
<form action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']))?>" method="post"
enctype="multipart/form-data"> 

Choose a .jpg or .png file to upload:<br />
<input type="file" name="upload_file" size="80">
<br />
<input type="submit" name="submit" value="submit">
</form>
</body>
</html>