<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="img/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

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
<div class="telefono_ventas"><a href="mailto:ventas@todopuertasautomaticas.com" target="_blank" class="Estilo3">ventas@todopuertasautomaticas.com</a>&nbsp;&nbsp;<a href="https://api.whatsapp.com/send?phone=+51 929 273 557&text=Hola, quisiera que me brinden una cotización..." target="_blank" img><img src="img/whatsapp.png" width="20px" height="20px" alt="" style="vertical-align:bottom" border="0"/></a>&nbsp;&nbsp;(+511) 929 273 557 - 929 273 557</div>
<div class="direccion">Jr. los economistas #4012 Urb. Ram&oacute;n Castilla SJL - Lima Per&uacute; </div>
</div>

<div class="marco_menu">
<nav><ul>
   <li><a href="index.php">Inicio</a></li>
   <li><a href="empresa/quienes_somos.php">Quienes somos</a></li>
   <li><a>Puertas</a>
      
	  <ul>
	  <li><a href="puertas/seccional.php">Seccional</a></li>
      <li><a href="puertas/enrollable.php">Enrollable</a></li>
      <li><a href="puertas/corredera.php">Corredera</a></li>
      <li><a href="puertas/batiente.php">Batiente</a></li>
	  <li><a href="puertas/levadiza.php">Levadiza</a></li>
	  <li><a href="puertas/cortafuego.php">Cortafuego</a></li>
	  </ul>
    </li>
      <li><a href="automatismo/automatismo.php">Automatismo</a></li>
      <li><a href="contacto/contacto.php">Contacto</a></li>
	  <?php require_once('libs/rs_encabezado_link_index.php');?>
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
  <div class="titulo_frame_menu_vertical_pa"><img src="img/titulo_pa.png" border="0"/></div>
<div class="frame_menu_vertical_pa"><a href="puertas_automaticas/puertas_automaticas.php"><img src="img/menu_vertical_pa.png" border="0"/></a></div>
<div class="titulo_frame_menu_vertical_a"><img src="img/titulo_a.png" border="0"/></div>
<div class="frame_menu_vertical_a"><a href="automatismo/automatismo.php"><img src="img/menu_vertical_a.png" border="0"/></a></div>
<div class="titulo_frame_menu_vertical_ss"><img src="img/titulo_ss.png" border="0"/></div>
<div class="frame_menu_vertical_ss"><a href="sistemas_seguridad/sistemas_seguridad.php"><img src="img/menu_vertical_ss.png" border="0"/></a></div>
</div>

<div class="frame_pos_vertical"><?php require_once('libs/cont_frame_pos_vertical.php');?></div>
<div class="frame_pie_pagina">
  <div class="redes_sociales_pie_pagina"><a href="contacto/contacto.php" target="_self"><img src="img/map.png" width="30px" height="30px" style="margin-top:5px" /></a><a href="https://www.facebook.com/660654007670149?referrer=whatsapp" target="_blank"><img src="img/facebook.png" width="30px" height="30px" style="margin-top:5px"/></a><a href="https://api.whatsapp.com/send?phone=+51 929 273 557&text=Hola, quisiera que me brinden una cotización..." target="_blank" img><img src="img/whatsapp.png" width="30px" height="30px" style="margin-top:5px" border="0"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php"><img src="img/home.png" width="30px" height="30px" style="margin-top:5px" border="0"/></a></div>
</div>

</div>
<script type="text/javascript">
</script>
</body>
</html>