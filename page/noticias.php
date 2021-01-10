<h1>Mural</h1>

<?php
$sql = "SELECT id, titulo, `data`, texto 
        FROM noticias
		ORDER BY data DESC, id DESC 
		LIMIT 5";
	
$resultados = mysql_query($sql)
                  	      or die (mysql_error());
if (@mysql_num_rows($resultado) == 0)
                  	      echo("");				   
?>

<?php
while ($res=mysql_fetch_array($resultados)) {
	$id = $res[0];
	$titulo = $res[1];
	$data = $res[2];
	$texto = $res[3];
?>
<span class="muralimg"><img src="midias/mural.jpg" /></span>
<h2><?php echo date('d/m/Y', strtotime($data) ); ?> - <?php echo $titulo; ?></h2>
<p><?php echo $texto; ?></p>


<?php
}
?>