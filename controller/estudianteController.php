<?php 

if ($peticionesAjax) {
    require_once '../model/EstudianteModel.php';
}else {
    require_once './model/EstudianteModel.php';
}

class estudianteController extends EstudianteModel
{

    public function __construct() {
        
    }
              
    public function listadoEstudiante()
    {
        setlocale(LC_MONETARY, 'es-CO');

        $respuesta = $this->get_listEstudiante();
        $data = array();

        while ($registro = $respuesta->fetchObject()) {
            $data[] = array(
                "0" => $registro->nombre,   
                "1" => $registro->identificacion,
                "2" => $registro->codigo,
                "3" => '<input type="checkbox" name="alumno'.$registro->id.'" id="alumno" class="form-control" value="'.$registro->id.'">'
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

    

}