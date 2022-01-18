<?php 

    if ($peticionesAjax) {
        require_once '../model/CusoEstudianteModel.php';
    }else {
        require_once './model/CusoEstudianteModel.php';
    }

    class cursoEstudianteController extends cursoEstudianteModel
    {

        private $idCurso;
        private $idEstudiante;
        
    
        public function __construct($idCurso, $idEstudiante) {
            $this->idCurso = $idCurso;
            $this->idEstudiante = $idEstudiante;
        }
        

        public function crearCursoEstudiante()
        {      
           
            $crearCursoEstudiante = $this->set_createCursoEstudiante($this->idCurso, $this->idEstudiante);
            if ($crearCursoEstudiante) {
                $respuesta = 2;
            }else {
                $respuesta = 3;
            }
          
            return $respuesta; 
        }

        public function listadoEstudiantes()
        {
            
            $Estudiantes = $this->get_listadoEstudiantes($this->idCurso);
            $id = array();
            $datos = array();
            while ($registro = $Estudiantes->fetchObject()) {
                $id[] = $registro->id;
            }

            echo json_encode($id);
        }

        public function eliminarEstudiante()
        {
            $retorno = $this->delectEstudiante($this->idCurso, $this->idEstudiante);
            if ($retorno) {
                $respuesta = 1;
            }else {
                $respuesta = 2;
            }

            return $respuesta;
        }
               
    }
    