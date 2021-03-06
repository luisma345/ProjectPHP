<?php 
	require '../db/conexion.php';
	require 'envioDetalle.php';
	require 'envioDetalleRuta.php';

	class DetalleEnvioModel extends Conexion{
		public $error='';

		function __construct(){
			parent:: __construct();
		}
		function getDetalleEnvio($e){
			$res=$this->con->query('SELECT d.idDetalleEnvio, d.idRuta, d.idEnvio, r.latPuntoA, r.lngPuntoA, r.latPuntoB, r.lngPuntoB, r.descripcion, r.carga  FROM detalleenvio d INNER JOIN ruta r on d.idRuta = r.idRuta where d.idEnvio ='.$e);
			$r=array();
			while($row=$res->fetch_assoc()) {
				$d= new EnvioDetalleRuta($row['idDetalleEnvio'],$row['idRuta'],$row['idEnvio'],$row["latPuntoA"],$row["lngPuntoA"],$row["latPuntoB"],$row["lngPuntoB"],$row["descripcion"],$row["carga"]);
				$r[]=$d;
			}
			return $r;
		}
		function getRuta(){
			$res=$this->con->query("select * from ruta");
			$r=array();
			while($row=$res->fetch_assoc()){
				$r[]=$row;
			}
			return $r;
        }
        function insertarDetalleEnvio($d){
			try{
				$detalle=$this->con->prepare('insert into detalleenvio(idRuta,idEnvio) values(?,?)');
				$detalle->bind_param('ss',$a,$b);
				$a=$d->getIdRuta();
                $b=$d->getIdEnvio();
                
				$detalle->execute();
				if(mysqli_error($this->con)){
					throw new exception("
					<script>
						alert(\"Error al insertar datos en el Detalle del Envio: ".$this->con->error."\");
					</script>");
				}
				
			}catch(Exception $ex){
				echo $ex->getMessage();
			}finally{
				$detalle->close();
			}
        }
        function modificarDetalleEnvio($d){
			try{
				$para=$this->con->prepare("UPDATE detalleenvio set idRuta=?, idEnvio=? where idDetalleEnvio =?");
                $para->bind_param('sss',$a,$b,$c);
                $a=$d->getIdRuta();
                $b=$d->getIdEnvio();
                $c=$d->getIdDetalleEnvio();
				
				$para->execute();
				if(mysqli_error($this->con)){
					throw new exception("
					<script>
						alert(\"Error al modificar datos en el Detalle del Envio: ".$this->con->error."\");
					</script>");
				}
				
            }catch(Exception $ex) {
				echo $ex->getMessage();
            }finally {
				$para->close();
            }
        }
        function eleminarDetalleEnvio($d){
			try{
				$para=$this->con->prepare("DELETE from detalleenvio where idDetalleEnvio=?");
				$para->bind_param('s',$a);
				$a=$d->getIdDetalleEnvio();
				
				$para->execute();
				if(mysqli_error($this->con)){
					throw new exception("
					<script>
						alert(\"Error al eliminar Detalle de Envio: ".$this->con->error."\");
					</script>");
				}
			}catch(Exception $ex){
				echo $ex->getMessage();
			}finally{
				$para->close();
			}
			
		}
	}
	
	?>