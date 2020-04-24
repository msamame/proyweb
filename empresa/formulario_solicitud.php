<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <table width="250" border="0" cellpadding="0" align="center">
  
  <tr>
     <td colspan="2"><img src="../img/logo.png" width="134" height="26" alt="" style="vertical-align:bottom" border="0"/></td>
  </tr>
  
   <tr>
      <td colspan="2" height="13">&nbsp;</td>
    </tr>
	
	<tr>
      <td><label for="company" style="font-size:12px">Empresa</label></td>
      <td><input type="text" id="compa&ntilde;y" name="name_company" placeholder="Nombre de tu empresa" style="font-size:12px" /></td>
    </tr>
	
    <tr>
      <td colspan="2" height="5">&nbsp;</td>
    </tr>
	
    <tr>
      <td><label for="name" style="font-size:12px">Nombre</label></td>
      <td><input type="text" id="name" name="visitor_name" placeholder="Tu nombre" style="font-size:12px" /></td>
    </tr>
	
    <tr>
      <td colspan="2" height="5">&nbsp;</td>
    </tr>

    <tr>
      <td><label for="name" style="font-size:12px">Teléfono</label></td>
      <td><input type="text" id="name" name="visitor_tf" placeholder="Solo números" pattern="^[1-9]\d*$" required style="font-size:12px" /></td>
    </tr>
	
    <tr>
      <td colspan="2" height="5">&nbsp;</td>
    </tr>


	
    <tr>
      <td><label for="email" style="font-size:12px">E-mail</label></td>
      <td><input type="email" id="email" name="visitor_email" placeholder="Formato (abc@abcde.com)" required style="font-size:12px" /></td>
    </tr>
	
    <tr>
      <td colspan="2" height="5">&nbsp;</td>
    </tr>
	
    <tr>
      <td><label for="title" style="font-size:12px">Asunto</label></td>
      <td><input type="text" id="title" name="email_title" required placeholder="Título" style="font-size:12px" /></td>
    </tr>
	
    <tr>
      <td colspan="2" height="5">&nbsp;</td>
    </tr>
	
    <tr>
      <td><label for="message" style="font-size:12px">Mensaje</label></td>
      <td><textarea id="message" name="visitor_message" placeholder="Contenido" required style="font-size:12px"></textarea></td>
    </tr>
	
    <tr>
      <td colspan="2" height="5">&nbsp;</td>
    </tr>
	

    <tr>
      <td colspan="2"><button type="submit" style="font-size:12px">enviar solicitud</button></td>
    </tr>
	
  </table>
</form>



<?php

if($_POST) {
    $name_company = "";
    $visitor_name = "";
	$visitor_tf = "";
    $visitor_email = "";
	$email_title = "";
    $visitor_message = "";
	
	if(isset($_POST['name_company'])) {
      $name_company = filter_var($_POST['name_company'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_name'])) {
      $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }
	
    if(isset($_POST['visitor_tf'])) {
      $visitor_tf = filter_var($_POST['visitor_tf'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
		$email_title = iconv("UTF-8", "ISO-8859-1", $email_title);
    }
     
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }
    
	// por siacaso
    $headers  = 'MIME-Version: 1.0' . "\r\n" 
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
	// por siacaso
	
	$mensaje='
    Solicitud de '.iconv("UTF-8", "ISO-8859-1", 'información'). ' '.iconv("UTF-8", "ISO-8859-1", 'técnica').' TODOPUERTAS AUTOMATICAS

    Datos del Cliente 

    Empresa     :  '.iconv("UTF-8", "ISO-8859-1", $name_company).'   
    Nombres     :  '.iconv("UTF-8", "ISO-8859-1", $visitor_name).'
    '.iconv("UTF-8", "ISO-8859-1", 'Teléfono').'     :  '.iconv("UTF-8", "ISO-8859-1", $visitor_tf).'
    Correo     :  '.iconv("UTF-8", "ISO-8859-1", $visitor_email).'
	Comentario :  '.iconv("UTF-8", "ISO-8859-1", $visitor_message).'
    ';
     
      if(mail($visitor_email, $email_title, $mensaje)) {
		echo "Gracias por contactarnos, $visitor_name. Estaremos respondiendo tu solicitus muy pronto.";  
    } else {
        echo '<p>Lo sentimos el email ingresado no es válido.</p>';
    }
} else {
    echo '<p>Algo salió mal, porfavor revise sus datos... </p>';
}
 
?>