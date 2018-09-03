<?php
/**
 * Created by PhpStorm.
 * User: David Ortiz
 * Date: 3/9/2018
 * Time: 3:48 PM
 */


	include '../tools/enlace.php';
	include '../tools/pelota.php';
		//$boton="ingresar";
		$boton=$_POST['boton'];
		if ($boton=='cerrar')
        {
            session_start();
            session_destroy();
        }
        else
        {


            //$email = "1";
            $email = $_POST['email'];
            $email1 =  str_replace("'","",$email);
            //$pass = "1708199200**..";
            $pass = $_POST['password'];
            //$pass1 =  str_replace("'","",$pass);
            $pass1 = encriptar($pass);
            $sql="SELECT usuarios.idUsuario,usuarios.tipoUsuario,usuarios.nombre,usuarios.fechaCreacion FROM usuarios WHERE  `user` = '".$email."' AND password='".$pass1."' AND usuarios.estado=1";
            $stmt = mysqli_query( $enlace, $sql);



            if ($stmt){

                $rows = mysqli_num_rows( $stmt );
                if ($rows == 1){

                    $Datos = mysqli_fetch_array($stmt,MYSQLI_ASSOC);

                    //INICIO FECHA
$fecha=$Datos["fechaCreacion"];
                    $dia = substr($fecha,8,2);
                    $mes = substr($fecha,5,2);
                    $aaa = substr($fecha,0,4);

                    switch ($mes){
                        case 01:
                            $miMes = "ENERO";
                            break;

                        case 02:
                            $miMes = "FEBRERO";
                            break;

                        case 03:
                            $miMes = "MARZO";
                            break;

                        case 04:
                            $miMes = "ABRIL";
                            break;

                        case 05:
                            $miMes = "MAYO";
                            break;

                        case 06:
                            $miMes = "JUNIO";
                            break;

                        case 07:
                            $miMes = "JULIO";
                            break;

                        case "08":
                            $miMes = "AGOSTO";
                            break;

                        case "09":
                            $miMes = "SEPTIEMBRE";
                            break;

                        case 10:
                            $miMes = "OCTUBRE";
                            break;

                        case 11:
                            $miMes = "NOVIEMBRE";
                            break;

                        case 12:
                            $miMes = "DICIEMBRE";
                            break;
                    }


                    $fCompleta = $dia."-".$miMes."-".$aaa;

                    //FINAL FECHA


                    $num_acceso = $Datos["idUsuario"];
                    $nombre = $Datos["nombre"];
                    $area 	= $Datos["tipoUsuario"];
                    $fechaInicio = $fCompleta;
                    session_start();
                    $_SESSION['ingreso']='YES';
                    $_SESSION['num_acceso']=$num_acceso;
                    $_SESSION['nombre'] = $nombre;
                    $_SESSION['area'] = $area;
                    $_SESSION['fechaInicio'] = $fechaInicio;


                    echo 'inicio.php';
                    //echo " Nombre de usuario: ".$nombre." Y contraseña es :".$nombre;
                }

                else{
                    echo "0";
                }


            }


        }


?>