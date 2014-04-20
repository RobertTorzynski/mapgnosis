 <? $idz= $_GET['idz']; $subject = $_GET['Tname']; $toAddy = $_GET['toAddy']; $comment =  $_GET['comment'];$t = $_GET['t'] ;$lat = $_GET['lat']; $lng = $_GET['lng'];$z= $_GET['z']; $message = 'http://assets.zgroks.com/index.html?t=hybrid&idz=' . $idz . '&lat=' . $lat . '&lng=' . $lng . '&z=' . $z . " " . $comment;
 
 mail($toAddy, $subject, $message); 
 header("Location: http://www.mapgnosis.com/index.html" . "?idz=" . $idz);?>
 //echo("<h3>Your email has been sent. Please close this window.</h3>")?>