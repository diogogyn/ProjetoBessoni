<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index3.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Painel de controle - Estofados bessoni</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- TinyMCE -->
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->

<link href="../estilo_painel.css" rel="stylesheet" type="text/css" />
<?php include"../Connections/config.php";

$conexao = mysql_connect("$hostname_config", "$username_config", "$password_config")
	        or die ("Erro ao conectar com o banco de dados. Por favor nos informe no e-mail estofadosbessoni@hotmail.com!");
$db = mysql_select_db("$database_config")
	        or die ("Erro ao selecionar a base de dados. Por favor nos informe no e-mail: estofadosbessoni@hotmail.com!");
			
?>
</head>
<body>
<div id="box">

<div id="background">	
    <div id="header">
   
     <div id="logo"> <a href="painel.php"><img src="../img/logo.jpg" /></a>
     </div><!--logo-->
 
   </div> <!--header-->
   
   <div id="headersp">
   </div><!--headersp-->
   
   <div id="menu">
   	<a href="#">Fale Conosco</a>
       <img src="../img/separador_menu.jpg" />
       <a href="noticias.php">Ultimas noticias</a>
       <img src="../img/separador_menu.jpg" />
       <a href="#">Galeria de fotos</a>
       <img src="../img/separador_menu.jpg" />
       <a href="empresa.php">Empresa</a>
       <img src="../img/separador_menu.jpg" />
       <a href="inicio.php">Inicio</a>
   </div><!--menu-->


<div id="spacer">
</div><!--spacer-->
<div id="content">
	<div id="conteudo">
	
    
    <center>
    <h2>Digite o Conteudo da pagina inicial no editor de texto abaixo:</h2><br />

     <div id="painel">
<?php
if (isset($_POST['cadastro']) && $_POST['cadastro'] == 'add') {
	
	$cadastra = mysql_query("INSERT INTO inicio (titulo, data, texto) VALUES ('$_POST[titulo]', '$_POST[data]', '$_POST[texto]')");
	
	if ($cadastra =='1') {
	echo "<h2>O Mural est&aacute; cadastrado e j&aacute pode ser visualizado em seu site!</h2>";
	}else {
		"Erro ao cadastrar mural";
	}
}
?>

<br />
<br />

<?php
if (isset($_POST['apagar']) && $_POST['apagar'] == 'excluir') {
	
	$deleta = mysql_query("DELETE FROM inicio WHERE id = '$_POST[id]'");
	
	if ($deleta =='1') {
	echo "<h2>Deletado com suscesso!</h2>";
	}else {
		"Erro ao deletar";
	}
	
}
?>


    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
			
            <strong><h3>Titulo:</h3></strong><input name="titulo" type="text" id="titulo" size="50" />
			<textarea name="texto" id="texto" rows="15" cols="80" style="width: 80%"></textarea>
			<input type="hidden" name="data" id="data" value="<?php echo date('Y-m-d'); ?>" />
		<br />
		  <input type="hidden" name="cadastro" value="add" />
            <input type="submit" name="cadastra" id="cadastra" value="Salvar alterações" class="btn" />
		<input type="reset" name="reset" value="Apagar texto" class="btn" />
</form>

 </div><!--painel-->
    <div id="painel">
    
<?php
$sql = "SELECT id, titulo FROM inicio ORDER BY data DESC, id DESC";
$resultado = mysql_query($sql)
             or die (mysql_error());
if (@mysql_num_rows($resultado) == 0)
             echo ("<br /><h2>Aviso: Não a nada cadastrado no mural</h2>");
?>   
    <form id="form2" name="form2" method="post" action="" enctype="multipart/form-data">
      <table border="0" align="center">
        <tr>
        <br /><br />
        </tr>
        <tr>
        <h3>Para apagar uma noticia selecione uma das op&ccedil;&otilde;es abaixo:</h3>
        </tr>
        <tr>
          <td>
          <label>
            <select name="id" id="id">
              <option value="-1"><h3>Selecione o mural a ser excluido</h3></option>
<?php
while($linha=mysql_fetch_array($resultado)) {
	$id = $linha[0];
	$titulo = $linha[1];
	
?>
              <option value="<?php echo $id; ?>"><?php echo $titulo; ?></option>
<?php
}
?>
            </select>
          </label></td>
          <td>&nbsp;<label>
            <input type="hidden" name="apagar" value="excluir" />
            <input type="submit" name="excluir" id="excluir" value="Apagar Mural" />
          </label></td>
        </tr>
      </table>
    </form>
  </div><!--painel-->
  
<script type="text/javascript">
if (document.location.protocol == 'file:') {
	alert("The examples might not work properly on the local file system due to security settings in your browser. Please use a real webserver.");
}
</script>
	</center>
	</div><!--conteudo-->
</div><!--content-->

</div><!--box-->
<div id="clear"></div><!--clear-->
<div id="footer">

 <?php echo date('Y') ?> <strong>Estofados bessoni &copy;</strong> - Todos os direitos reservados
<br />
<br />
<h4>Desenvolvido por: Diogo e Heector | <a href="<?php echo $logoutAction ?>">DESLOGAR/SAIR</a></h4>
</div><!--footer-->
</div><!--background-->
</div><!--box-->
</body>
</html>


