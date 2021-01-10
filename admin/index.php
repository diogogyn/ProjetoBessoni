<?php require_once('../Connections/config.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['login'])) {
  $loginUsername=$_POST['login'];
  $password=$_POST['senha'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "painel.php";
  $MM_redirectLoginFailed = "index2.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_config, $config);
  
  $LoginRS__query=sprintf("SELECT login, senha FROM `admin` WHERE login=%s AND senha=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $config) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel de controle</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="box">
   <div id="loginbox">
    <h1>Painel de Controle</h1>
    <div id="login">
    <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
    <table border="0" align="center">
      <tr>
        <td align="right">Usuário:</td>
        <td><label>
          <input name="login" type="text" id="login" size="35" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Senha:</td>
        <td><label>
          <input name="senha" type="password" id="senha" size="35" />
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><label>
          <input type="submit" name="logar" id="logar" value="Logar-se" />
        </label></td>      
      </tr>
    </table>
    </form>
    </div><!--login-->
    <h3><a href="../index.php">Voltar</a></h3>
  </div><!--loginbox-->
  
</div><!--box-->
</body>
</html>