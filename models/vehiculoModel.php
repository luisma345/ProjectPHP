<?php  
	require '../db/conexion.php';
	require 'vehiculo.php';

	class VehiculoModel extends Conexion
	{
		public $error="";
		function __construct()
		{
			parent::__construct();
		}

		function getVehiculo(){
			$res=$this->con->query("select * from vehiculo");
			$r=array();
			while($row=$res->fetch_assoc()){
				$e=new Vehiculo($row["idVehiculo"],$row["marca"],$row["placa"],$row["modelo"],$row["tazaCombustible"],$row["capacidadCombustible"]);
				$r[]=$e;
			}
			return $r;
		}

		function insertarVehiculo($e){
			try{
				$para=$this->con->prepare("insert into vehiculo(idVehiculo,marca,placa,modelo,tazaCombustible,capacidadCombustible) values(?,?,?,?,?,?)");
				$para->bind_param('ssssss',$a,$b,$c,$d,$ee,$f);
				$a='';
				$b=$e->getMarca();
				$c=$e->getPlaca();
				$d=$e->getModelo();
				$ee=$e->getTazaCombustible();
				$f=$e->getCapacidadCombustible();
				$para->execute();
			}catch(Exception $ex){
				return $ex;
			}finally{
				$para->close();
			}
		}

		function modificarVehiculo($e){
			try{
				$para=$this->con->prepare("update vehiculo set marca=?,placa=?,modelo=?,tazaCombustible=?,capacidadCombustible=? where idVehiculo=?");
				$para->bind_param('ssssss',$a,$b,$c,$d,$ee,$f);
				
				$a=$e->getMarca();
				$b=$e->getPlaca();
				$c=$e->getModelo();
				$d=$e->getTazaCombustible();
				$ee=$e->getCapacidadCombustible();
				$f=$e->getIdVehiculo();
				$para->execute();
			}catch(Exception $ex){
				return $ex;
			}finally{
				$para->close();
			}
		}

		function eliminarVehiculo($e){
			try{
				$para=$this->con->prepare("delete from vehiculo where idVehiculo=?");
				$para->bind_param('s',$a);
				$a=$e->getIdVehiculo();
				$para->execute();
			}catch(Exception $ex){
				return $ex;
			}finally{
				$para->close();
			}
		}
	}

?> 