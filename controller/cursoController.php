<?php 

    if ($peticionesAjax) {
        require_once '../model/CursoModel.php';
    }else {
        require_once './model/CursoModel.php';
    }

    class cursoController extends cursoModel
    {

        private $nombre;
        private $idProfesor;
        private $idCurso;
        
    
        public function __construct($nombre, $idProfesor, $idCurso) {
            $this->nombre = !empty($nombre) ? $this->get_cleanText($nombre) : "";
            $this->idProfesor = !empty($idProfesor) ? $this->get_cleanText($idProfesor) : "";
            $this->idCurso = !empty($idCurso) ? $this->get_cleanText($idCurso) : "";
        }
        

        public function crearCurso()
        {
            if (empty($this->idCurso)) {
                $existe = $this->get_existeCurso($this->nombre);
                if ($existe->rowCount() > 0) {
                    $respuesta = 2;
                }else {
                    $crearCurso = $this->set_createCurso($this->nombre, $this->idProfesor);
                    if ($crearCurso->rowCount() > 0) {
                        $respuesta = 3;
                    }else {
                        $respuesta = 4;
                    }
                }   
            }else {
                $editarCursos = $this->set_updateCurso($this->idCurso, $this->nombre, $this->idProfesor);
                if ($editarCursos->rowCount() > 0) {
                    $respuesta = 5;
                }else {
                    $respuesta = 6;
                }
            }
            
            
            return $respuesta;
        }
        
        public function dataUltimoCurso()
        {
            $dataUltimoCurso = $this->get_dataUltimoCurso();
            
            echo json_encode($dataUltimoCurso);
        }

        public function listarCursos()
        {
            $respuesta = $this->get_listCursos();
            $data = array();
    
            while ($registro = $respuesta->fetchObject()) {
                $data[] = array(
                    "0" => $registro->nombreCurso,   
                    "1" => $registro->nombreProfesor,
                    "2" => '<button type="button" onclick="dataCursos(' . $registro->id . ');" class="btn btn-success" title="Editar Curso">
                        <i class="fas fa-edit   "></i></button>'." ".'<button type="button" onclick="editarAlumnos(' . $registro->id . ', \''.$registro->nombreCurso.'\', \''.$registro->nombreProfesor.'\');" class="btn btn-success" title="Editar alumnos">
                        <i class="fas fa-clipboard-list"    "></i></button>'

                );
            }
    
            $resul = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            
            echo json_encode($resul);
            
        }

        public function dataCurso()
        {
            $dataCurso = $this->get_dataCursos($this->idCurso);
            echo json_encode($dataCurso);
        }

        public function selectCurso()
        {
           $listaCurso = $this->get_listCursos();
           if ($listaCurso->rowCount() > 0) {
                while ($registro = $listaCurso->fetchObject()) {
                   echo '<option value='.$registro->id.'>'.$registro->nombreCurso.'</option>';
               }
           }
        }
               
    }
    