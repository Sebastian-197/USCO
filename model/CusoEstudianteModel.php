<?php 

    if ($peticionesAjax) {
        require_once '../config/conexion.php';
    }else {
        require_once './config/conexion.php';
    }

    class cursoEstudianteModel extends mainModelConexion
    {
        protected function set_createCursoEstudiante($idCurso, $idEstudiante){

            $numeroElementos = 0;
            $h = true;
            while ($numeroElementos < count($idEstudiante)) {
                $sql = "INSERT INTO cursos_estudiante (id_curso, id_estudiante)
                        VALUES ('$idCurso', '$idEstudiante[$numeroElementos]')";
                $this->runQuery($sql) or $h = false;
                $numeroElementos +=1;
            }
            
            return $h;
        }

        protected function get_listadoEstudiantes($idCurso){
            $sql = "SELECT id_estudiante AS id FROM cursos_estudiante WHERE id_curso = '$idCurso'";

            return $this->runQuery($sql);
        }

        protected function delectEstudiante($idCurso, $idEstudiante){
            $numeroElementos = 0;
            $h = true;
            while ($numeroElementos < count($idEstudiante)) {
                $sql = "DELETE FROM cursos_estudiante WHERE id_curso = '$idCurso' AND id_estudiante = '$idEstudiante[$numeroElementos]'";
                $this->runQuery($sql) or $h = false;    
                
                $numeroElementos +=1;
            }
            
            return $h;
        }
    }
    