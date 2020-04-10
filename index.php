<?php //require_once('libs/startup.php'); ?>

<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="img/favicon.ico" />

<style type="text/css">
.Estilo3 {
font-size: 14px;
text-decoration:none;
color: #3366FF;
}

</style>
<head>

<title></title>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript"></script>
</head>
<body>
<div class="frame">

<div class="marco_logo">
<div class="logo"></div>
<div class="redes_sociales"><a href="mailto:ventas@todopuertasautomaticas.com" target="_blank" class="Estilo3">ventas@todopuertasautomaticas.com</a>&nbsp;&nbsp;<img src="img/whatsapp.png" width="20px" height="20px" alt="" />&nbsp;&nbsp;(+511) 929273557 - 929273557&nbsp;&nbsp;<img src="img/facebook.png" width="20px" height="20px"/></div>
<div class="direccion">Jr los economistas #4012 Urb. Ram&oacute;n Castilla SJL - Lima Per&uacute; </div>
</div>

<div class="marco_menu">
<nav><ul>
   <li><a href="#">Inicio</a></li>
   <li><a href="#">Qui&eacute;nes somos</a></li>
   <li><a href="#">Puertas</a>
      
	  <ul>
	  <li><a href="">Seccional</a></li>
      <li><a href="">Enrollable</a></li>
      <li><a href="">Corredera</a></li>
      <li><a href="">Batiente</a></li>
	  <li><a href="">Levadiza</a></li>
	  <li><a href="">Cortafuego</a></li>
	  </ul>
    </li>
      <li><a href="#">Automatismo</a></li>
      <li><a href="#">Contacto</a></li>
</ul></nav>

</div>



<div class="c">

<?php
$numbanners = 5; //numero de banners que se rotarán
$random = rand(1,$numbanners);

//for ($i = $numbanners; ; $i++){
//   if ($i > $numbanners){
//   $i=1;
//   }
?>
<!----div class="c1"><img src="img/banner<?php //echo $i ?>.png"  alt="" /></div!-->
<div class="c1"><img src="img/banner1.png"  alt="" /></div>

<?php
//ob_flush();flush();sleep(5);
//} $i=1;

?>
</div>

<div class="frame_menu_vertical">
<?php require_once('libs/menu_vertical.php');?>
<div class="frame_menu_vertical_pa"><a href="puertas_automaticas/puertas_automaticas.php"><img src="img/menu_vertical_pa.png" border="0"/></a></div>
<div class="frame_menu_vertical_a"><a href="automatismo/automatismo.php"><img src="img/menu_vertical_a.png" border="0"/></a></div>
<div class="frame_menu_vertical_ss"><a href="sistemas_seguridad/sistemas_seguridad.php"><img src="img/menu_vertical_ss.png" border="0"/></a></div>
</div>



</div>

<script type="text/javascript">
</script>
</body>

</html>