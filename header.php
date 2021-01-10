<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include"Connections/config.php";

$conexao = mysql_connect("$hostname_config", "$username_config", "$password_config")
or die ("Erro ao conectar com o banco de dados. Por favor nos informe no e-mail:estofadosbessoni@hotmal.com!");
$db = mysql_select_db("$database_config")
or die ("Erro ao selecionar a base de dados. Por favor nos informe no e-mail estofadosbessoni@hotmal.com!");

?>
	<link rel="stylesheet" href="scripts/css/lightbox.css" type="text/css" media="screen" />
	<script src="scripts/js/prototype.js" type="text/javascript"></script>
	<script src="scripts/js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="scripts/js/lightbox.js" type="text/javascript"></script>

	<style type="text/css">
		body{ color: #333; font: 13px 'Lucida Grande', Verdana, sans-serif;	}
	</style>
    
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="box">
<div id="background">	
    <div id="header">
   
     <div id="logo">
     <img src="img/logo.jpg" />
     </div><!--logo-->
     <div id="search">
          <form id="form1" name="form1" method="post" action="index.php?up=nav/pesquisa">
             <table border="0" align="right" cellpadding="3" cellspacing="3">
               <tr>
                 <td><span class="pesquisar">Pesquisar por:</span></td>
                 <td><input name="search" type="text" id="search" size="38" /></td>
                 <td><input type="submit" name="buscar" id="buscar" value="Buscar" /></td>
               </tr>
             </table>
          </form>
         </div><!--search-->
   </div> <!--header-->
   
   <div id="headersp">
   </div><!--headersp-->
   
   <div id="menu">
   	<a href="index.php?pagina=page/contato">Fale Conosco</a>
       <img src="img/separador_menu.jpg" />
       <a href="index.php?pagina=page/noticias">Ultimas noticias</a>
       <img src="img/separador_menu.jpg" />
       <a href="index.php?pagina=page/galeria">Galeria de fotos</a>
       <img src="img/separador_menu.jpg" />
       <a href="index.php?pagina=page/empresa">Empresa</a>
       <img src="img/separador_menu.jpg" />
       <a href="index.php?pagina=page/inicio">Inicio</a>
   </div><!--menu-->


<div id="spacer">
</div><!--spacer-->