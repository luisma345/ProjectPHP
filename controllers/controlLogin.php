<?php
    require '../models/usuarioCliModel.php';

    $obUser=new UsuarioCliModel();
    
    //Valida el usuario, si empieza con "emp" buscará en la tabla UsuariosEmp;
    if(isset($_REQUEST["btnUsuario"])) {

       

        $user=$_REQUEST["usuarioCli"];
        if(isset($_REQUEST["usuarioCli"])){
            $num=(strlen($user)-3);
            $rest = substr($user, 0, -($num));
        }
        if($rest=="Emp"){
            $r=$obUser->validarSoloUsuarioEmpleado($_REQUEST["usuarioCli"]);
        } else {
            $r=$obUser->validarSoloUsuario($_REQUEST["usuarioCli"]);
        }
        
        
        if($r==1) {
            header("Location:controlLoginCliente.php");

        }
        else {
            header("Location:controlLoginEmpleado.php");
        }
       
    }
    


    require "../views/login.php";
?>