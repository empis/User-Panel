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

<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

</head>
<?
//Function
function check_password_db($nickname,$password) {
    include_once 'mysql.php';
	$a=mysql_query("SELECT password FROM authme where username = '$nickname'");
	if(mysql_num_rows($a) == 1 ) {
	   $password_info=mysql_fetch_array($a);
	   $sha_info = explode("$",$password_info[0]);
	 } else return false;
	if( $sha_info[1] === "SHA" ) {
						$salt = $sha_info[2];
						$sha256_password = hash('sha256', $password);
						$sha256_password .= $sha_info[2];;
						if( strcasecmp(trim($sha_info[3]),hash('sha256', $sha256_password) ) == 0 ) return true;
						else return false;
	}

}
//---------------------
session_start();
//Odhlasenie
if($_GET['page'] == 'logout')
{
$_SESSION["logined"]=0;
echo '
<center><img src="images/valid.png"><font color="green">Úspešne odhlásený.</font></center>
';
}
//-----------------------
if (isset($_POST['prihlasit'])) {
$meno = $_POST['menoo'];
$heslo = $_POST['hesloo'];
if($meno == "" || $heslo == ""){
echo '
<center><img src="images/error.png"><font color="red">Nezadal si meno alebo heslo.</font></center>
';
}else{
$spravnost = check_password_db($meno, $heslo);
if($spravnost == false){
echo '
<center><img src="images/error.png"><font color="red">Zadal si nesprávne údaje.</font></center>
';
}else{
$_SESSION['logined']=1;
$_SESSION['loginmeno']=$meno;
include_once 'mysql.php';
$b=mysql_query("SELECT admin FROM authme where username = '$meno'");
$c=mysql_fetch_array($b);
if($c[0] == 1){
	$_SESSION['admin']=1;
}
header("Location: index.php");
}
}
}
?>
<body>
<div id="main_container">

	<div class="header_login">
    
    </div>

     
         <div class="login_form">
         
         <h3>User Panel Login</h3>
         
         <form action="?" method="post" class="niceform">
         
                <fieldset>
                    <dl>
                        <dt><label for="email">Meno:</label></dt>
                        <dd><input type="text" name="menoo" id="" size="54" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="password">Heslo:</label></dt>
                        <dd><input type="password" name="hesloo" id="" size="54" /></dd>
                    </dl>
                    
                    <dl>
                        <dt><label></label></dt>
                        <dd>
                    <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">Zapametať si ma</label>
                        </dd>
                    </dl>
                    
                     <dl class="submit">
                    <input type="submit" name="prihlasit" id="submit" value="Prihlásiť sa" />
                     </dl>
                    
                </fieldset>
                
         </form>
         </div>  
          
	
    
    <div class="footer_login">
    
    	<div class="left_footer_login">USER PANEL | Coded by EMPIS, Design by <a href="http://indeziner.com">INDEZINER</a></div>
    	<div class="right_footer_login"><a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

</div>		
</body>
</html>