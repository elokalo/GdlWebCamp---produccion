<?php 
    function usuario_autenticado(){
        //Si la sesion no existe, es decir si el usuario no existe que redireccione a 'login.php'
        if(!revisar_usuario()){
            header('Location:login.php');
            exit();
        }
    }

    function revisar_usuario(){
        return (isset($_SESSION['usuario']));
    }

session_start();
usuario_autenticado();
?>