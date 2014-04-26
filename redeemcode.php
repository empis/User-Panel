<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>USER PANEL | CooperPack Server</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<script src="jquery.jclock-1.2.0.js.txt" type="text/javascript"></script>
<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>
<script type="text/javascript">
$(function($) {
    $('.jclock').jclock();
});
</script>

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />
<?
session_start();
if($_SESSION["logined"] != "1"){
header("Location: login.php");
}
if(isset($_POST["logoutfs"])){
$_SESSION["logined"] = "0";
header("Location: index.php");
}
//----------------------
?>
</head>
<body>
<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Vitaj <? echo $_SESSION["loginmeno"]; if($_SESSION["admin"] == 1){ echo " | Admin Účet"; } ?>, <a href="http://cooperpack.empis.eu/">Navštíviť stránku</a> | <a href="login.php?page=logout" class="logout">Odhlásiť sa</a></div>
    <div class="jclock"></div>
    </div>
    
    <div class="main_content">
    
                    <div class="menu">
                    <ul>
                    <li><a href="index.php">User Info</a></li>
                    <li><a class="current" href="redeemcode.php">Použitie kódu<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
					<li><a >Obchod<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="shop.php" title="">Item</a></li>
						<li><a href="shopvip.php" title="">Vip</a></li>
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    <li><a>Nastavenia<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="passchange.php" title="">Zmena hesla</a></li>
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    <li><a href="contact.php">Kontakt</a></li>
					<?
						if($_SESSION["admin"] == 1){
							echo '<li><a>Admin</a>
								 <!--[if lte IE 6]><table><tr><td><![endif]-->
								 <ul>
								 <li><a href="command.php" title="">Príkaz</a></li>
								 <li><a href="codecreate.php" title="">Vytvorenie kódov</a></li>
								 <li><a href="changeacc.php" title="">Nastavenie účtov</a></li>
								 </ul>
								 <!--[if lte IE 6]></td></tr></table></a><![endif]-->
								 </li>';
						}
					?>
                    </ul>
                    </div> 
                    
                    
                    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">
    
    		</div>
    
    <div class="right_content">            
        
    <h2>Použiť kód</h2> 
						<?
					if (isset($_POST['pouzitkod'])) {
$kod = $_POST['zadanykod'];
$hrac = $_SESSION['loginmeno'];
if($kod == ""){
echo '<center><img src="images/error.png"><font color="red">Nezadal si kód.</font></center>';
}else{
//connect to db
include_once 'mysqlcode.php';
$query = mysql_query("SELECT `code`, `player`, `usage`, `time` FROM `code` WHERE `code` = '$kod'");
$row = mysql_fetch_array($query, MYSQL_ASSOC);
$playerrow = $row["player"];
$timerow = $row["time"];
if($row["code"] != $kod){ echo '<center><img src="images/error.png"><font color="red">Zadany kod neexistuje, over ci si ho zadal spravne, ak problem pretrva kontaktujte admina.</font></center>'; }else{
if($row["usage"] == "cooperpackvip"){
if($row["player"] != ""){ echo "<center><img src='images/error.png'><font color='red'>Kod uz bol pouzity hracom $playerrow</font></center>"; }else{
    $time = $row["time"] * 86400;
    include_once 'Websend.php';
    
    $ws = new Websend("cp.empis.eu");
	include_once "mysql.php";
    $ws->password = $websend;
    
    if($ws->connect()){
        $ws->doCommandAsConsole('pex user '.$hrac.' group add vip "" '.$time);
        $ws->disconnect();
	    mysql_query("UPDATE `code` SET `player`='$hrac' WHERE `code`='$kod'");
		echo "<center><img src='images/valid.png'><font color='green'>Vip aktivovane na $timerow dni pre $hrac na servery CooperPack.</font></center>";
    }else{
        echo '<center><img src="images/error.png"><font color="red">Nepodarilo sa pripojiť.</font></center>';
    }
	}
}else if($row["usage"] == "freecooperpackvip"){
$hracc = explode(" ", $row["player"]);
if(in_array($_SESSION["loginmeno"], $hracc)){ echo '<center><img src="images/error.png"><font color="red">Už si použil tento kód.</font></center>'; }else{
$time = $row["time"] * 86400;
    include_once 'Websend.php';
    
    $ws = new Websend("cp.empis.eu");
	include_once "mysql.php"
    $ws->password = $websend;
    
    if($ws->connect()){
        $ws->doCommandAsConsole('pex user '.$hrac.' group add vip "" '.$time);
        $ws->disconnect();
		$updateplayer = $row["player"]." ".$_SESSION["loginmeno"];
	    mysql_query("UPDATE `code` SET `player`='$updateplayer' WHERE `code`='$kod'");
		echo "<center><img src='images/valid.png'><font color='green'>Vip aktivovane na $timerow dni pre $hracc na servery CooperPack.</font></center>";
    }else{
        echo '<center><img src="images/error.png"><font color="red">Nepodarilo sa pripojiť.</font></center>';
    }
}
}else if($row["usage"] == "freekredity"){
$hracc = explode(" ", $row["player"]);
if(in_array($_SESSION["loginmeno"], $hracc)){ echo '<center><img src="images/error.png"><font color="red">Už si použil tento kód.</font></center>'; }else{
		$updateplayer = $row["player"]." ".$_SESSION["loginmeno"];
	    mysql_query("UPDATE `code` SET `player`='$updateplayer' WHERE `code`='$kod'");
		mysql_close();
		include_once "mysql.php";
		$query2 = mysql_query("SELECT * FROM `authme` WHERE `username` = '$hrac'");
		$row2 = mysql_fetch_array($query2, MYSQL_ASSOC);
		$updatekredity = $row2["kredity"]+$row["time"];
		$pocetkreditov = $row["time"];
		mysql_query("UPDATE `authme` SET `kredity`='$updatekredity' WHERE `username`='$hrac'");
		echo "<center><img src='images/valid.png'><font color='green'>Na tvoj účet bolo pripočítaných '$pocetkreditov' kreditov.</font></center>";
    }
}
} //koniec overenia kodu
}}
					?>
<div class="form">
         <form action="" method="post" class="niceform">
         
                <fieldset>
                    <dl>
                        <dt><label for="email">Kód:</label></dt>
                        <dd><input type="text" name="zadanykod" id="" size="54" /></dd>
                    </dl>
					<dl class="submit">
                    <input type="submit" name="pouzitkod" id="submit" value="Použiť kód" />
                     </dl>
                </fieldset>
				</div>
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
    <div class="footer">
    
    	<div class="left_footer">USER PANEL | Coded by EMPIS, Design by <a href="http://indeziner.com">INDEZINER</a></div>
    	<div class="right_footer"><a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

</div>		
</body>
</html>