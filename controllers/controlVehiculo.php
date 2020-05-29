<?php  
	require '../models/vehiculoModel.php';

	$error="";
	$obVehiculo=new VehiculoModel();

	if (isset($_REQUEST["insertar"])) {
		$e=new Vehiculo($_REQUEST["idVehiculo"],$_REQUEST["marca"],$_REQUEST["placa"],$_REQUEST["modelo"],$_REQUEST["tazaCombustible"],$_REQUEST["capacidadCombustible"]);
		$error=$obVehiculo->insertarVehiculo($e);
	}

	if (isset($_REQUEST["modificar"])) {
		$e=new Vehiculo($_REQUEST["idVehiculo"],$_REQUEST["marca"],$_REQUEST["placa"],$_REQUEST["modelo"],$_REQUEST["tazaCombustible"],$_REQUEST["capacidadCombustible"]);
		$error=$obVehiculo->modificarVehiculo($e);
	}

	if (isset($_REQUEST["eliminar"])) {
		$e=new Vehiculo($_REQUEST["idVehiculo"],$_REQUEST["marca"],$_REQUEST["placa"],$_REQUEST["modelo"],$_REQUEST["tazaCombustible"],$_REQUEST["capacidadCombustible"]);
		$error=$obVehiculo->eliminarVehiculo($e);
	}	

	$datos=$obVehiculo->getVehiculo();
	require '../views/vehiculoVista.php';
?>