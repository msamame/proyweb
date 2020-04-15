<form action="../empresa/formulario_solicitud.php" method="post">
<table width="250" border="0" cellpadding="0">

    <tr>
	<td><label for="company" style="font-size:14px">Empresa</label></td>
    <td><input type="text" id="compañy" name="name_company" placeholder="Todopuertas automaticas" pattern=[A-Z\sa-z]{3,20} required style="font-size:14px"></td>
    </tr>


    <tr>
	<td><label for="name" style="font-size:14px">Nombre</label></td>
    <td><input type="text" id="name" name="visitor_name" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} required style="font-size:14px"></td>
    </tr>
  

    <tr>
	<td><label for="email" style="font-size:14px">E-mail</label></td>
    <td><input type="email" id="email" name="visitor_email" placeholder="john.doe@email.com" required style="font-size:14px"></td>
    </tr>
  
    <tr>
    <td><label for="department-selection" style="font-size:14px">Choose Concerned Department</label></td>
    <td><select id="department-selection" name="concerned_department" required style="font-size:14px">
        <option value="">Select a Department</option>
        <option value="billing">Billing</option>
        <option value="marketing">Marketing</option>
        <option value="technical support">Technical Support</option>
    </select></td>
    </tr>
  
    <tr>
    <td><label for="title" style="font-size:14px">Asunto</label></td>
    <td><input type="text" id="title" name="email_title" required placeholder="Unable to Reset my Password" pattern=[A-Za-z0-9\s]{8,60} style="font-size:14px"></td>
    </tr>
  
    <tr>
    <td><label for="message" style="font-size:14px">Mensaje</label></td>
    <td><textarea id="message" name="visitor_message" placeholder="Say whatever you want." required style="font-size:14px"></textarea></td>
    </tr>
	
  <tr>
  <td><button type="submit" style="font-size:14px">enviar</button></td>
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
     
    if(isset($_POST['concerned_department'])) {
        $concerned_department = filter_var($_POST['concerned_department'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }
     
    if($concerned_department == "billing") {
        $recipient = "fanwakuay@gmail.com";
    }
    else if($concerned_department == "marketing") {
        $recipient = "fanwakuay@gmail.com";
    }
    else if($concerned_department == "technical support") {
        $recipient = "fanwakuay@gmail.com";
    }
    else {
        $recipient = "fanwakuay@gmail.com";
    }
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    if(mail("fanwakuay@gmail.com","Correo de prueba","Esto es un correo de prueba","manuel_samame_farfan@hotmail.com.com")) {
        echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
     
} else {
    echo '<p>Something went wrong</p>';
}
 
?>