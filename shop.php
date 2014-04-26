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
<script language="javascript">
function changeText(idElement){
var index = document.getElementById('amount'+idElement).selectedIndex;
var amount = document.getElementById('amount'+idElement).options[index].text;
var amount = parseInt(amount);
var price = document.getElementById('price'+idElement).innerHTML;
var price = parseInt(price);
var cost = amount * price;
document.getElementById('totalprice'+idElement).innerHTML = '(x'+amount+') = '+cost;
}
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
                    <li><a href="redeemcode.php">Použitie kódu<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
					</li>
                    <li><a class="current">Obchod<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a class="current" href="shop.php" title="">Item</a></li>
						<li><a href="shopvip.php" title="">Vip</a></li>
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
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
        
    <h2>Obchod</h2> 
<?
if(isset($_POST["buy"])){
require_once("config.php");
require_once("mysql.php");
$ign = $_SESSION['loginmeno'];
$block = trim($_POST['block']);
$damage = trim($_POST['damage']);
$amount = trim($_POST['amount']);
$price = trim($_POST['price']);
$sqlquery = mysql_query("SELECT * FROM $tablename WHERE $username = '$ign'");
$sqldata = mysql_fetch_assoc($sqlquery);
$money = $sqldata[$moneyname];

$cost = $amount*$price;
if ($money >= $cost){
$money = $money - $cost;
$query = "UPDATE $tablename SET $moneyname='".$money."' WHERE $username='".$ign."'";
mysql_query($query);

$order = "[+(".$block.":".$damage.")x".$amount."]";
$q = mysql_query("SELECT * FROM player WHERE playername='$ign'");
$qq = mysql_fetch_assoc($q);
$qqq = $qq["id"];
$sqlquery = mysql_query("SELECT * FROM $InventorySQL WHERE playerID = '$qqq'");
$sqldata = mysql_fetch_assoc($sqlquery);
$pendings = $sqldata[pendings];
$comma = ",";
if ($pendings == ""){
$comma = "";
}

$pendings .= trim($comma.$order);
$query = "UPDATE $InventorySQL SET pendings='".$pendings."' WHERE playerID='".$qqq."'";
mysql_query($query);

$sqlquery = mysql_query("SELECT * FROM $InventorySQL WHERE playerID = '$qqq'");
$sqldata = mysql_fetch_assoc($sqlquery);
$pendings = $sqldata[pendings];
echo '<center><img src="images/valid.png"><font color="green">Úspešne si kúpil item.</font></center>';
}
else {
echo '
<center><img src="images/error.png"><font color="red">Nemáš dostatok kreditov.</font></center>
';
}
}
require_once("config.php");

$limit = 0;

if (isset($_GET['limit'])){
$limit = $_GET['limit'];
}
$limit = $limit*$viewlimit + $viewlimit;


$ign = $_SESSION['loginmeno'];

$render2 = explode(",", $render);
include_once "mysql.php";
$sqlquery = mysql_query("SELECT * FROM $tablename WHERE $username = '$ign'");
$sqldata = mysql_fetch_assoc($sqlquery);
$money = $sqldata[$moneyname];

$item = explode("/n", $stock);
$stockcount = count($item) - 1;
$limitcount = ceil ($stockcount/$viewlimit);



$i = $limit - $viewlimit;
echo '                    
<table id="rounded-corner" summary="Obchod">
    <thead>
    	<tr>
            <th scope="col" class="rounded"></th>
            <th scope="col" class="rounded"><center>Meno</center></th>
            <th scope="col" class="rounded">Cena/block</th>
			<th scope="col" class="rounded">Kúpiť</th>
        </tr>
    </thead>
    <tbody>
	        ';
while ($i < $limit){
$info = explode(",", $item[$i]);

$data = "";

	if ($info[1] != 0){
    $data = "_".$info[1];
	}
	
$rendermsg = "";

$check = $info[0];
if($info[1] != 0){
$check = trim($info[0]."d".$info[1]);
}
if (in_array($check, $render2)) {
$rendermsg = "/renders";
}

	
	echo ' <tr>
        
                           <td width="36" height="45">
<img class="dval-img" src="images/blocks'.$rendermsg.'/'.$info[0].$data.'.png"></td><td width="485" align = "center">'.$info[2].'</td>';
if($info[3] == 0){
echo ' <td width="43"> ------- </td>';
}else{
echo   ' <td width="60"><div id = "price'.$i.'">'.$info[3].'</div><div class = "cost" id = "totalprice'.$i.'">(x1) = '.$info[3].'</div></td>';
}
							
if($info[3] == 0){
echo '<td width="100"> ------- </td>';
}else{

							
  echo '<td width="100">
<form id = "submit'.$i.'" action="?" method="POST">
<select id = "amount'.$i.'" name="amount" onChange = changeText('.$i.')>
  <option>01</option>
  <option>02</option>
  <option>03</option>
  <option>04</option>
  <option>05</option>
  <option>06</option>
  <option>07</option>
  <option>08</option>
  <option>09</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
  <option>13</option>
  <option>14</option>
  <option>15</option>
  <option>16</option>
  <option>17</option>
  <option>18</option>
  <option>19</option>
  <option>20</option>
  <option>21</option>
  <option>22</option>
  <option>23</option>
  <option>24</option>
  <option>25</option>
  <option>26</option>
  <option>27</option>
  <option>28</option>
  <option>29</option>
  <option>30</option>
  <option>31</option>
  <option>32</option>
  <option>33</option>
  <option>34</option>
  <option>35</option>
  <option>36</option>
  <option>37</option>
  <option>38</option>
  <option>39</option>
  <option>40</option>
  <option>41</option>
  <option>42</option>
  <option>43</option>
  <option>44</option>
  <option>45</option>
  <option>46</option>
  <option>47</option>
  <option>48</option>
  <option>49</option>
  <option>50</option>
  <option>51</option>
  <option>52</option>
  <option>53</option>
  <option>54</option>
  <option>55</option>
  <option>56</option>
  <option>57</option>
  <option>58</option>
  <option>59</option>
  <option>60</option>
  <option>61</option>
  <option>62</option>
  <option>63</option>
  <option>64</option>
</select>
<input type="hidden" name="block" value="'.$info[0].'" />
<input type="hidden" name="price" value="'.$info[3].'" />
<input type="hidden" name="damage" value="'.$info[1].'" />
<input type="submit" name="buy" value="Kúpiť" />
</td>
</form>




							</tr>';
}
$i++;
}



?>
<tr>
<td colspan = "4"><b> Strana: </b>
<?php 
$limit = 0;

if (isset($_GET['limit'])){
$limit = $_GET['limit'];
}

if ($limit == 0){
$prev = 0;}else{
$prev = $limit - 1;
}

if ($limit == $limitcount){
$next = $limitcount;}else{
$next = $limit + 1;
}

if ($limit == 0){
echo '<font color = "gray"><< Dozadu</font>';
echo '&nbsp;&nbsp;&nbsp;';
}else{
echo '<a href = "shop.php?limit='.$prev.'"><< Dozadu</a>';
echo '&nbsp;&nbsp;&nbsp;';
}

$i = 0;
while ($i < $limitcount){

$comma = ", ";
if ($i == $limitcount - 1){
$comma = "";
}
$p = $i + 1;
if ($i == $limit){
echo '<b>'.$p.'</b>';
echo $comma;
}else{
echo '<a href = "shop.php?limit='.$i.'">'.$p.'</a>';
echo $comma;
}
$i++;
}

if ($next == $limitcount){
echo '&nbsp;&nbsp;&nbsp;';
echo '<font color = "gray">Ďalej >></font>';
}else{
echo '&nbsp;&nbsp;&nbsp;';
echo '<a href = "shop.php?limit='.$next.'">Ďalej >></a>';
}
?>                        
</td>
</tr>
</tbody></table>

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