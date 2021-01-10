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

<link href="../estilo_painel.css" rel="stylesheet" type="text/css" />
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
	
	<h1>Bem vindo ao Painel de controle do Site Estofados Bessoni!</h1>
    <hr />
    <img src="../midias/mural.jpg" alt="" width="60" height="60" /><h3>Aqui voc&ecirc; poder&aacute; editar e fazer todas as altera&ccedil;&otilde;es em seu site. Basta clicar nas paginas e digitar o conteudo no editor de texto que &eacute; oferecido no site.</h3>
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
