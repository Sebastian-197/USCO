<?php 

    $peticionesAjax = true;

    require_once '../config/config.php';
    
    if (isset($_POST['idCursos']) && isset($_POST['idEstudiante'])) {
        
        if (!empty($_POST['idEstudiante'])) {
            require_once '../controller/cursoEstudianteController.php';
            $crear = new cursoEstudianteController($_POST['idCursos'], $_POST['idEstudiante']);
            echo $crear->crearCursoEstudiante();
        }else {
            echo 1;
        }

    }elseif (isset($_GET['op'])) {
        if ($_GET['op'] == 1) {
            require_once '../controller/cursoEstudianteController.php';
            $listaAlumnos = new cursoEstudianteController($_POST['idCurso'], "");
            echo $listaAlumnos->listadoEstudiantes();
        }
        if ($_GET['op'] == 2) {
            require_once '../controller/cursoEstudianteController.php';
            $eliminarAlumnos = new cursoEstudianteController($_POST['idCurso'], $_POST['idEstudiante']);
            echo $eliminarAlumnos->eliminarEstudiante();
        }
    }
    else {
        session_start();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'home/" </script>';
    }
