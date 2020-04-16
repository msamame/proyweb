<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <table width="250" border="0" cellpadding="0">
  
  <tr>
     <td colspan="2"><img src="../img/logo.png" width="134" height="26" alt="" style="vertical-align:bottom" border="0"/></td>
  </tr>
  
   <tr>
      <td colspan="2" height="13">&nbsp;</td>
    </tr>
	
	<tr>
      <td><label for="company" style="font-size:12px">Empresa</label></td>
      <td><input type="text" id="compa&ntilde;y" name="name_company" placeholder="Numbre de tu empresa" pattern=[A-Z\sa-z]{3,20} required style="font-size:12px" /></td>
    </tr>
	
    <tr>
      <td colspan="2" height="5">&nbsp;</td>
    </tr>
	
    <tr>
      <td><label for="name" style="font-size:12px">Nombre</label></td>
      <td><input type="text" id="name" name="visitor_name" placeholder="Tu nombre" pattern=[A-Z\sa-z]{3,20} required style="font-size:12px" /></td>
    </tr>
	
    <tr>
      <td colspan="2" height="5">&nbsp;</td>
    </tr>

    <tr>
      <td><label for="name" style="font-size:12px">Teléfono</label></td>
      <td><input type="text" id="name" name="visitor_tf" placeholder="solo números" pattern="^[1-9]\d*$" required style="font-size:12px" /></td>
    </tr>
	
    <tr>
      <td colspan="2" height="5">&nbsp;</td>
    </tr>


	
    <tr>
      <td><label for="email" style="font-size:12px">E-mail</label></td>
      <td><input type="email" id="email" name="visitor_email" placeholder="formato (abc@abcde.com)" required style="font-size:12px" /></td>
    </tr>
	
    <tr>
      <td colspan="2" height="5">&nbsp;</td>
    </tr>
	
    <tr>
      <td><label for="title" style="font-size:12px">Asunto</label></td>
      <td><input type="text" id="title" name="email_title" required placeholder="Informacion" pattern=[A-Za-z0-9\s]{8,60} style="font-size:12px" /></td>
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
      <td><button type="submit" style="font-size:12px">enviar</button></td>
    </tr>
  </table>
</form>



<?php
 
if($_POST) {
    $name_company = "";
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $concerned_department = "";
    $visitor_message = "";
	
	if(isset($_POST['name_company'])) {
      $name_company = filter_var($_POST['name_company'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_name'])) {
      $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
    }
     
   
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }
     
    
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
      if(mail($visitor_email, $email_title, $visitor_message)) {
	  
		echo "Thank you for contacting us, $visitor_name. You will get a reply within 24 hours";  
		 
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
     
} else {
    echo '<p>Something went wrong</p>';
}
 
?>