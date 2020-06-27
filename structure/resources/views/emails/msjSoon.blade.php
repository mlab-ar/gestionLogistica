<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Plataforma Web Logistica - Webmail - Contacto</title>
</head>
<body>

<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

	<div style="position:relative; margin:auto; width:600px; background:white; padding-bottom:20px">

		<center>

		<img style="padding-top:20px; width:15%" src="https://workana.secrojas.com/images/email.png">


		<h3 style="font-weight:100; color:#999;">HAS RECIBIDO UNA CONSULTA</h3>

		<hr style="width:80%; border:1px solid #ccc">

		<h4 style="font-weight:100; color:#999; padding:0px 20px; text-transform:uppercase">{{ $name}}</h4>

		<h4 style="font-weight:100; color:#999; padding:0px 20px;">{{ $email}}</h4>

    <h4 style="font-weight:100; color:#999; padding:0px 20px;">Asunto: {{ $subject}}</h4>

		<h4 style="font-weight:100; color:#999; padding:0px 20px;">Mensaje: {{ $cment}}</h4>

		<h4 style="font-weight:100; color:black; padding:0px 20px">Mensaje recibido desde la web</h4>

		<hr style="width:80%; border:1px solid #ccc">

		</center>

	</div>

</div>

</body>
</html>
