<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<h1>Fale Conosco</h1>
<img src="midias/faleconosco.jpg" />
<h2>Venha tomar um caf&eacute;zinho com nossa equipe.</h2>

<?php
if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {
	
//<input type="hidden" name="enviar" value="send" />

$date = date("d/m/Y h:i");

// ****** ATENÇÃO ********
// ABAIXO ESTÁ A CONFIGURAÇÃO DO SEU FORMULÁRIO.
// ****** ATENÇÃO ********

//CABEÇALHO - ONFIGURAÇÕES SOBRE SEUS DADOS E SEU WEBSITE
$nome_do_site="UpInside";
$email_para_onde_vai_a_mensagem = "estofadosbessoni@hotmail.com";
$nome_de_quem_recebe_a_mensagem = "Estofados Bessoni";
$exibir_apos_enviar='';

//MAIS - CONFIGURAÇOES DA MENSAGEM ORIGINAL
$cabecalho_da_mensagem_original="From: $name <$email>\n";
$assunto_da_mensagem_original="Fale conosco";

// FORMA COMO RECEBERÁ O E-MAIL (FORMULÁRIO)
// ******** OBS: SE FOR ADICIONAR NOVOS CAMPOS, ADICIONE OS CAMPOS NA VARIÁVEL ABAIXO *************
$configuracao_da_mensagem_original="

ENVIADO POR:\n
Nome: $nome\n
E-mail: $email\n
Telefone: $telefone\n\n\n
Mensagem: $mensagem\n\n

ENVIADO EM: $date";

//CONFIGURAÇÕES DA MENSAGEM DE RESPOSTA
// CASO $assunto_digitado_pelo_usuario="s" ESSA VARIAVEL RECEBERA AUTOMATICAMENTE A CONFIGURACAO
// "Re: $assunto"
$assunto_da_mensagem_de_resposta = "Confirmação";
$cabecalho_da_mensagem_de_resposta = "From: $nome_do_site <$email_para_onde_vai_a_mensagem>\n";
$configuracao_da_mensagem_de_resposta="Obrigado por entrar em contato!\nEstaremos respondendo em breve...\nAtenciosamente,\n$nome_do_site\n\nEnviado em: $date";

// ****** IMPORTANTE ********
// A PARTIR DE AGORA RECOMENDA-SE QUE NÃO ALTERE O SCRIPT PARA QUE O  SISTEMA FINCIONE CORRETAMENTE
// ****** IMPORTANTE ********

//ESSA VARIAVEL DEFINE SE É O USUARIO QUEM DIGITA O ASSUNTO OU SE DEVE ASSUMIR O ASSUNTO DEFINIDO
//POR VOCÊ CASO O USUARIO DEFINA O ASSUNTO PONHA "s" NO LUGAR DE "n" E CRIE O CAMPO DE NOME
//'assunto' NO FORMULARIO DE ENVIO
$assunto_digitado_pelo_usuario="s";

//ENVIO DA MENSAGEM ORIGINAL
$headers = "$cabecalho_da_mensagem_original";
if ($assunto_digitado_pelo_usuario=="s")
{
$assunto = "$assunto_da_mensagem_original";
};
$seuemail = "$email_para_onde_vai_a_mensagem";
$mensagem = "$configuracao_da_mensagem_original";
mail($seuemail,$assunto,$mensagem,$headers);

//ENVIO DE MENSAGEM DE RESPOSTA AUTOMATICA
$headers = "$cabecalho_da_mensagem_de_resposta";
if ($assunto_digitado_pelo_usuario=="s")
{
$assunto = "$assunto_da_mensagem_de_resposta";
}
else
{
$assunto = "Re: $assunto";
};
$mensagem = "$configuracao_da_mensagem_de_resposta";
mail($email,$assunto,$mensagem,$headers);

/*echo "<script>window.location='$exibir_apos_enviar'</script>";*/
echo "Sua mensagem foi enviada com suscesso, Estaremos respondendo o mais breve possivel!";
}
?>


<div id="formcontato">
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">

  <fieldset>
    <legend>
      Nome:
    </legend>
    <span id="sprytextfield1">
    <input name="nome" type="text" id="nome" size="50" />
    <br />
    <span class="textfieldRequiredMsg">Informe seu nome.</span></span>
  </fieldset>
  
  <fieldset>
    <legend>
      E-mail:
    </legend>
    <span id="sprytextfield2">
    <input name="email" type="text" id="email" size="50" />
    <br />
    <span class="textfieldRequiredMsg">Informe seu e-mail.</span><span class="textfieldInvalidFormatMsg">Informe um e-mail v&aacute;lido.</span></span>
  </fieldset>
  
  <fieldset>
    <legend>
      Telefone:
    </legend>
    <span id="sprytextfield3">
    <input name="telefone" type="text" id="telefone" size="50" />
    <br />
    <span class="textfieldRequiredMsg">Informe seu telefone.</span><span class="textfieldInvalidFormatMsg">N&uacute;mero inv&aacute;lido. Informe com DDD</span></span>
  </fieldset>
  
  <fieldset>
    <legend>
      Assunto:
    </legend>
    <span id="sprytextfield4">
    <input name="assunto" type="text" id="assunto" size="50" />
    <br />
    <span class="textfieldRequiredMsg">Qual o assunto?</span></span>
  </fieldset>
  
  <fieldset>
    <legend>
      Mensagem
    </legend>
    <span id="sprytextarea1">
    <label>
      <textarea name="mensagem" id="mensagem" cols="55" rows="3"></textarea>
      <span id="countsprytextarea1">&nbsp;</span></label>
      <br />
    <span class="textareaRequiredMsg">Faltou a mensagem.</span><span class="textareaMaxCharsMsg">Exedeu o maximo de caracteres!</span></span>
  </fieldset>
  
  <fieldset>
    <label>
      <input type="hidden" name="enviar" value="send" />
      <input type="submit" name="send" id="send" value="Enviar" />
    </label>
  </fieldset>

</form>
</div><!--formcontato-->

Por telefone: (62)3289-0124<br />
Por E-mail: estofadosbessoni@hotmail.com<br />
Goi&acirc;nia - GO - Brasil
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email", {useCharacterMasking:true});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "custom", {pattern:"00 0000-0000", useCharacterMasking:true});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {maxChars:500, counterType:"chars_remaining", counterId:"countsprytextarea1"});
//-->
</script>
