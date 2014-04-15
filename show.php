<?php
require("dbAssetMapInfo.php");

$nowTime= $_GET['rpcNgxd'];

function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
//$xmlStr=str_replace('"','&quot;',$xmlStr); 
//$xmlStr=str_replace("'",'&apos;',$xmlStr); 
//$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 

// Opens a connection to a mySQL server
$connection=mysql_connect ("localhost", $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active mySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM assets WHERE 1 ORDER BY id DESC";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/html");


echo '<!DOCTYPE html>'; 
echo '<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> ';
echo '<head>' ;     

echo '<link href="tablecloth.css" rel="stylesheet" type="text/css" media="screen" />  ';
echo '<script type="text/javascript" src="tablecloth.js"></script>                    ';
                              
echo ' <STYLE TYPE="text/css">';
echo ' body{                                             ';                                                   
echo ' 	margin:0;                                        ';            
echo ' 	padding:0;                                       ';
echo ' 	background:#f1f1f1;                              ';
echo ' 	font:80% Arial, Helvetica, sans-serif;           ';
echo ' 	color:#555;                                      ';
echo ' 	line-height:100%;                                ';
echo ' 	text-align:left;                                 ';
echo ' }                                                 ';
echo ' a{                                                ';
echo ' 	text-decoration:none;                            ';
echo ' 	color:#057fac;                                   ';
echo ' }                                                 ';
echo ' a:hover{                                          ';
echo ' 	text-decoration:none;                            ';
echo ' 	color:#999;                                      ';
echo ' }                                                 ';
echo ' h1{                                               ';
echo ' 	font-size:140%;                                  ';
echo ' 	margin:0 20px;                                   ';
echo ' 	line-height:80px;	                               ';
echo ' }                                                 ';
echo ' h2{                                               ';
echo ' 	font-size:120%;                                  ';
echo ' }                                                 ';
echo ' #container{                                       ';
echo ' 	margin:0 auto;                                   ';
echo ' 	width:680px;                                     ';
echo ' 	background:#fff;                                 ';
echo ' 	padding-bottom:20px;                             ';
echo ' }                                                 ';
echo ' #content{margin:0 20px;}                          ';
echo ' p.sig{	                                           ';
echo ' 	margin:0 auto;                                   ';
echo ' 	width:680px;                                     ';
echo ' 	padding:1em 0;                                   ';
echo ' }                                                 ';
echo ' form{                                             ';
echo ' 	margin:1em 0;                                    ';
echo ' 	padding:.2em 20px;                               ';
echo ' 	background:#eee;                                 ';
echo ' }                                                 ';
echo ' </STYLE>';


echo '<title>Mapgnosis Links</title>                                                                            ' ;
echo '</head>';
echo '<body>';

echo '<table><tr><th>Title</th><th><a style="color: #EFE; text-decoration: underline" href="http://assets.zgroks.com/showType.php" title="click to sort by type"/>Sort by Type</a></th><th>Posted By</th><th>Posted When</th><th>Comments&nbsp;&nbsp;&nbsp;<a style="color: #EFE; text-decoration: underline" href="https://www.hackerleague.org/hackathons/at-and-t-rochester-civic-app-challenge/hacks/mapgnosis" title="About this Application"/>About Mapgnosis</a></th><th>Lat</th><th>Lng</th></th><th>Del</th></tr>';
// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  
  	
  
  
  
   echo '<tr><td><a style="font-size: large" href="http://assets.zgroks.com/index.html?t=hybrid&lat=' . $row['lat'] . '&lng=' . $row['lng'] . '&idz=' . $row['id'] . '&z=15">' . stripslashes(parseToXML($row['name'])) . '</a></td>'; //';

//	if (stripslashes(parseToXML($row['imageAddress']))  == "") {  
//	echo '<td><a href="http://assets.zgroks.com/uploads/noImageAvail.png"/><img src="http://assets.zgroks.com/uploads/noImageAvail.png" width="108px" title="No Image Uploaded ... yet!"/></a></td>';
//	}	else {
//   echo '<td class= "woodGrain"><a href="http://assets.zgroks.com/uploads/' . stripslashes(parseToXML($row['imageAddress'])) . '"/><img src="http://assets.zgroks.com/uploads/' . stripslashes(parseToXML($row['imageAddress'])) . '" width="108px" title="Left Click to view full-size Image."/></a></td>';
// 	}
  	
  	
    echo '<td style="font-size: large">' . stripslashes(parseToXML($row['type'])) . '</td>'; //
    echo '<td style="font-size: large">' . stripslashes(parseToXML($row['userName'])) . '</td>'; //
    echo '<td style="font-size: large">' . stripslashes(parseToXML($row['address'])) . '</td>'; //
    echo '<td style="font-size: large">' . stripslashes(parseToXML($row['comments'])) . '</td>';
    echo '<td style="font-size: large">' . stripslashes(parseToXML($row['lat'])) . '</td>';
    echo '<td style="font-size: large">' . stripslashes(parseToXML($row['lng'])) . '</td>';
    // gives 1 hour to delete = 1,000 * 60 * 60
    if ( $nowTime - $row['user_comments'] < 36000000 &&  $nowTime - $row['user_comments'] > 0  ) {
    echo '<td><a href="http://assets.zgroks.com/deleteTriprow.php?idz=' . stripslashes(parseToXML($row['id'])) . '" title="Please Use with Caution!"/><small>Del</small></a></td>';
    } 
    else {
    	echo '<td>n/a</td>';
    }
    
   // echo '<td bgcolor="#ebecf6" class="icon">' . $row['type'] . '</td></tr>';
  }
  echo '</table>';

// End XML file
echo '</body>   ';
echo '</html>   ';

?>
