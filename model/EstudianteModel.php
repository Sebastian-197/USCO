<?php 

    if ($peticionesAjax) {
        require_once '../config/conexion.php';
    }else {
        require_once './config/conexion.php';
    }

    class EstudianteModel extends mainModelConexion
    {
        
        protected function get_listEstudiante(){
            $sql = "SELECT id_estudiante AS id, nombre_estudiante AS nombre, identificacion_estudiante AS identificacion, codigo_estudiante AS codigo 
                    FROM estudiantes";
            return $this->runQuery($sql);
        }
    
    }
    