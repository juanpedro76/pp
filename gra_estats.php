<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
echo' <center><p><strong>RTS/Menciones Analizados/Links</center></strong>';
mysql_connect($bd_host, $bd_usuario, $bd_password) or die ("error1".mysql_error());
mysql_select_db($bd_base) or die ("error2".mysql_error());

//consultes

$consulta = mysql_query("SELECT tweet_urls.url,COUNT(url) as resultado, screen_name FROM tweet_urls, tweets WHERE  `url` Not LIKE 'http://t.co' AND `url` Not LIKE 'http://t.co/VsN' AND `url` Not LIKE 'http://t.co/sFN' and tweet_urls.tweet_id = tweets.tweet_id GROUP BY url ORDER BY resultado DESC LIMIT 15");

//modificar altresconsultes.php

mysql_query($consulta, $conexion);


?>
<script type="text/javascript">
   var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'estadistiques',
                type: 'areaspline'
            },
            title: {
                text: 'RTS Enviados'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF'
            },
            xAxis: {
                categories: ['<?php echo join($rt_fecha, "','");?>'],
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]
            },
            yAxis: {
                title: {
                     text: 'rts enviados'
                }
            },
            tooltip: {
                formatter: function() {
                   return ''+
                    this.x +': '+ this.y +' rts';
               }
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'tweets',
                data: [<?php echo join($rt_num,',');?>]
            }]
        });
    });
</script>
 <?php
echo' <p>Primero de todo tenemos una gráfica en que autentificamos el número de de tweets enviados durante las fechas analizadas';
?>
<div id="estadistiques" style="height: 300px; width: 670px"></div>
<?php 
echo'En la siguiente tabla encontramos los <strong>10 RT</strong> más relevantes aparecidos durante el evento y el primer usuario que realizó';
echo '<center>';
echo '<table border="0" id="mitabla">';  
echo '<tr>';
echo '<th scope="col">RT Enviado</th>';
echo '<th scope="col">Veces</th>';
echo '</tr>';
while ($most1 = mysql_fetch_array($top_rts)) {
echo '<tr>';
echo '<td style="text-align: left; width: 30;"> '  . $most1['tweet_text'] . '</td>' . ' ';
echo '<td style="text-align: center; width: 85;"> '  . $most1['resultado'] . '</td>' . ' ';
echo '</tr>';
}
// libera los registros de la tabla
echo'</table>';
echo'</center>';

mysql_query($consulta, $conexion);
?>
<script type="text/javascript">
   var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'linksenviados',
                type: 'areaspline'
            },
            title: {
                text: 'Links Enviados'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF'
            },
            xAxis: {
                categories: ['<?php echo join($link_fecha, "','");?>'],
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]
            },
            yAxis: {
                title: {
                     text: 'links enviados'
                }
            },
            tooltip: {
                formatter: function() {
                   return ''+
                    this.x +': '+ this.y +' rts';
               }
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'links',
                data: [<?php echo join($link_num,',');?>]
            }]
        });
    });
</script>

<?php

echo'Mostramos el número de de links enviados durante las fechas  analizadas';
?>

<div id="linksenviados" style="height: 300px; width: 670px"></div>

<?php

echo'En la siguiente tabla encontramos los 15 links más relevantes aparecidos durante el evento y el número de veces que apareció.';


echo '<center>';
echo '<table border="0" id="mitabla">';  
echo '<tr>';
echo '<th scope="col">Link enviado</th>';
echo '<th scope="col">Veces</th>';
echo '</tr>';
while ($most1 = mysql_fetch_array($consulta)) {
echo '<tr>';
echo '<td><a href="'.$most1['url'].'">'  . $most1['url'] . '</a>'; 
echo '<td style="text-align: left; width: 30;"> '  . $most1['resultado'] . '</td>' . ' ';
echo '</tr>';
}
// libera los registros de la tabla
echo'</table>';
echo'</center>';
mysql_free_result($consulta);

mysql_close($conexion); // cierra la conexion con la base de datos

?>

