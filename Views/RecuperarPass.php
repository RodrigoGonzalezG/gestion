<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Control de reportes</title>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../css/sb-admin.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/Operaciones.js"></script>
</head>

<body id="LoginForm">
	<div class="loading"></div>
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center text-black mb-4">Coordinación de recursos materiales, abastecimiento y servicios</h2>
				<div class="text-center p-5">
					<img src="Imgs/gcdmx.png" style="width:30%;padding:0%;">
				</div>
				<div class="row">
					<div class="col-md-6 mx-auto">
						<div class="card rounded-0">
							<div class="card-header">
								<h3 class="mb-0">Recuperar contraseña</h3>
							</div>
							<div class="card-body">
								<form class="form" role="form" id="formLogin" method="POST">
									<label>Correo</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i> </span>
										</div>
										<input type="text" class="form-control" name="user" placeholder="Capture su correo" autofocus>
									</div>
									<label>Contraseña nueva</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i> </span>
										</div>
										<input type="password" class="form-control" name="pass" placeholder="Contraseña" readonly>
									</div>
                                    <div class="text-center">
									<button type="button" class="btn btn-success btn-lg" id="btnLogin">Guardar</button>
                                        </div><br>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
