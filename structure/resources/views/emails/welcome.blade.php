<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Plataforma Web Logistica - Nuevo usuario registrado</title>
</head>
<body>

<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

	<div style="position:relative; margin:auto; width:600px; background:white; padding-bottom:20px">

		<center>

		<img style="padding-top:20px; width:15%" src="http://transfont.es/lay-admin/dist/img/new-user.png">


		<h3 style="font-weight:100; color:#999;">SE REGISTRO UN NUEVO USUARIO</h3>

		<hr style="width:80%; border:1px solid #ccc">

		<h4 style="font-weight:100; color:#999; padding:0px 20px; text-transform:uppercase">NOMBRE: {{ $user->name}}</h4>

		<h4 style="font-weight:100; color:#999; padding:0px 20px;">EMAIL: {{ $user->email}}</h4>

		<hr style="width:80%; border:1px solid #ccc">

		</center>

	</div>

</div>

</body>
</html>
