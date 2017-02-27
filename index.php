<!doctype html>
<html class="no-js" lang="esp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Bienvenido</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include_once 'include/incCabecera.php'; ?>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="contenedor">
        	<header>
        		<div class="bienvenida text-center">
        			<div class="page-header">
        				<h1>Hola, Welcome! <small>al inicio de tu gran viaje</small></h1>
        			</div>        			
        			<div class="panel panel-primary">
        				<div class="panel-heading">
        					<div class="panel-title text-center text-capitalize">ingresa</div>
        				</div>
        				<div class="panel-body">
        					<div id="mensajeSesion"></div>        					
        					<div class="form-group">
        						<input type="text" class="form-control" placeholder="Usuario" id="userLogin">
        					</div>
        					<div class="form-group">
        						<input type="password" class="form-control" placeholder="Contraseña" id="passLogin">
        					</div>
        				</div>
        				<div class="panel-footer">
        					<button class="btn btn-default" type="button" id="login">Ingresar</button>
        				</div>
        			</div>
        		</div>
        	</header>
        </div> <!-- /.contenedor -->        

    	<?php include_once 'include/incPie.php'; ?>
    </body>
</html>