<?php

$bd_host = "localhost"; 
$bd_usuario = "test"; 
$bd_password = "test"; 
<<<<<<< HEAD
$bd_base = "twt_aerco"; 
=======
$bd_base = "twt_marato"; 
>>>>>>> fd712c7... ver3

mysql_connect($bd_host, $bd_usuario, $bd_password) or die ("error1".mysql_error());
mysql_select_db($bd_base) or die ("error2".mysql_error());

//añadir los hashtags motorizados

<<<<<<< HEAD
$consultahast1=mysql_query("SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'Aercomparte'union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'aerco' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'lacaixaesmordor' order by num DESC");

//eliminar los hashtags motorizados

$consultahast2=mysql_query("SELECT tag,COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE not  tag = 'aerco' and not tag='15m' and not tag = 'Aercomparte'  and not tag='FF' GROUP BY tag ORDER BY num DESC LIMIT 20");
=======
$consultahast1=mysql_query("SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'maratopobresa'union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'sobrencadires' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'lacaixaesmordor' order by num DESC");


//eliminar los hashtags motorizados

$consultahast2=mysql_query("SELECT tag,COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE not  tag = 'maratopobresa' and not tag='15m' and not tag = 'sobrencadires'  and not tag='yovoy12m' and not tag='12m' and not tag='lacaixaesmordor' and not tag='FF' GROUP BY tag ORDER BY num DESC LIMIT 20");
>>>>>>> fd712c7... ver3


while ($crow1 = mysql_fetch_array ($consultahast1)) {
$ct1 = $crow1 [tag];
$twt6tag[] = $ct1;
$ct2 = $crow1 [num];
$twt6num[] = $ct2;
}

while ($crow2 = mysql_fetch_array ($consultahast2)) {
$ct3 = $crow2 [tag];
$twt2tag[] = $ct3;
$ct4 = $crow2 [num];
$twt2num[] = $ct4;
}
?>
