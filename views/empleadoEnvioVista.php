<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envios Empleado - La Trailera</title>
    <!--Dependencias-->
    <!-- <link rel="stylesheet" type="text/css" href="dependencias/bootstrap/css/bootstrap.css"> -->
    <script type="text/javascript" src="dependencias/jquery.js"></script>
    <!-- <script type="text/javascript" src="dependencias/bootstrap/js/bootstrap.js"></script> -->
    <script type="text/javascript" src="dependencias/sweetalert2.all.min.js"></script>
    <!-- Tailwind -->
    <link rel="stylesheet" href="dependencias/tailwind.css">
    <!--CSS-->
    <link rel="stylesheet" href="css/menu.css">
    <!--Logo-->
    <link rel="icon" type="image/png" href="img/logo/Logo-LaTrailera.png">
</head>
<body>
    <?php
        $currentPage='Envios';
        require 'menu/menuEmpleado.php';
    ?>
    <div class="text-center">
        <span class="font-bold text-4xl">Envios</span>
    </div>
    <center>
    <section>
        <div class="container">               
            <div class="px-16 py-4 border-4 border-gray-600 rounded-lg">
            <form action="#" method="POST" id="f">
                <div id="d1"></div>
                    <div class="md:flex">
                        <div class="w-full md:w-1/2">
                            <span class="font-bold text-xl">ID Envio</span>
                            <input type="text" name="idEnvio" id="idEnvio" class="bg-gray-400 focus:outline-none focus:shadow-outline border-2 border-gray-600 rounded-lg py-2 px-4 block w-full appearance-none leading-normal font-bold" readonly="true">
                        </div>
                    </div>
                    <div class="md:flex">
                        <div class="w-full md:w-1/2">
                            <span class="font-bold text-xl">Fecha Realización</span>
                            <input type="date" name="fechaRealizacion" id="fechaRealizacion" class="bg-white focus:outline-none focus:shadow-outline border-2 border-gray-600 rounded-lg py-2 px-4 block w-full appearance-none leading-normal font-bold" required>
                        </div> 
                        <div class="w-full md:w-1/2 md:ml-2">
                            <span class="font-bold text-xl">Fecha Entrega</span>
                            <input type="date" name="fechaEntrega" id="fechaEntrega" class="bg-white focus:outline-none focus:shadow-outline border-2 border-gray-600 rounded-lg py-2 px-4 block w-full appearance-none leading-normal font-bold" required>
                        </div>
                    </div>
                    <div class="md:flex">
                        <div class="w-full md:w-1/2">
                            <span class="font-bold text-xl">Usario de Cliente que solicito envio</span>
                            <div class='relative'>
                            <select name="usuarioCli" id="usuarioCli" class="bg-white focus:outline-none focus:shadow-outline border-2 border-gray-600 rounded-lg py-2 px-4 block w-full appearance-none leading-normal font-bold" required>
                                    <option value=""></option>
                                    <?php
                                        foreach ($datosUsuarioCli as $u) {
                                            echo "<option value=".$u['idUsuarioCli'].">".$u['usuarioCli']."</option>";
                                        }
                                    ?>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                            </div>
                        </div> 
                        <div class="w-full md:w-1/2 md:ml-2">
                            <span class="font-bold text-xl">Usuario Empleado que tomo Envio</span>
                            <input type="text" name="usuarioEmp" id="usuarioEmp" class="bg-white focus:outline-none focus:shadow-outline border-2 border-gray-600 rounded-lg py-2 px-4 block w-full appearance-none leading-normal font-bold" readonly="true" value="<?php echo $_SESSION["empleado"]; ?>">
                        </div>
                    </div>
                    
                <br>
            
                    <!---->
            <div>
                <div class="w-full">
                    <input type="submit" name="guardar" id="g" value="Guardar" class="bg-blue-700 hover:bg-red-800 text-white text-xl mt-2 py-1 px-2 rounded">
                </div>
            </div>
            </form>
            </div>
        </div>
               
        <br>
            <table class="table-auto">
                    <thead>
                        <tr>
                            <th class='text-center text-white bg px-4 py-2'>ID</th>
                            <th class='text-center text-white bg px-4 py-2'>Fecha Realización</th>
                            <th class='text-center text-white bg px-4 py-2'>Fecha Entrega</th>
                            <th class='text-center text-white bg px-4 py-2'>Usuario Cliente</th>
                            <th class='text-center text-white bg px-4 py-2'>Usuario Empleado</th>
                            <th class='text-center text-white bg px-4 py-2'>Acción</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($datos as $e) {
                                $idEnvio=$e->getIdEnvio();
                                $fechaRealizacion=$e->getFechaRealizacion();
                                $fechaEntrega=$e->getFechaEntrega();
                                $idCliente=$e->getIdCliente();
                                $idEmpleado=$e->getIdEmpleado();
                                $usuarioCli=$e->getusuarioCli();
                                $usuarioEmp=$e->getusuarioEmp();
                                $idUsuarioCli=$e->getIdUsuarioCli();
                                $idUsuarioEmp=$e->getIdUsuarioEmp();

                                
                                echo "
                                    <tr>
                                        <td class='border-b-4 border-gray-600 rounded-lg text-center font-bold px-4 py-2'>$idEnvio</td>
                                        <td class='border-b-4 border-gray-600 rounded-lg text-center px-4 py-2'>$fechaRealizacion</td>
                                        <td class='border-b-4 border-gray-600 rounded-lg text-center px-4 py-2'>$fechaEntrega</td>
                                        <td class='border-b-4 border-gray-600 rounded-lg text-center px-4 py-2'>$usuarioCli</td>
                                        <td class='border-b-4 border-gray-600 rounded-lg text-center px-4 py-2'>$usuarioEmp</td>
                                        <td class='border-b-4 border-gray-600 rounded-lg text-center px-4 py-2'>
                                        <form action='controlEmpleadoDetalleEnvio.php' method='GET'> 
                                        <input type='hidden' name='idEnvioD' id='idEnvioD' value='$idEnvio'>
                                            <input type='submit' class='bg-blue-700 hover:bg-red-800 text-white py-1 px-4 rounded' name='btnDetalleEnvio' value='Detalle de Envio'>
                                        </form>    
                                        </td>
                                        
                                    </tr>";
                            }
                            
                        ?>
                    </tbody>
                </table> 
    </section>
</center>
    <footer></footer>
</body>
</html>