<?php

namespace julio101290\boilerplatedrivers\Controllers;

use App\Controllers\BaseController;
use \julio101290\boilerplatedrivers\Models\{
    ChoferesModel
};
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecompanies\Models\EmpresasModel;

class ChoferesController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $choferes;

    public function __construct() {
        $this->choferes = new ChoferesModel();
        $this->log = new LogModel();
        $this->empresa = new EmpresasModel();
        helper('menu');
        helper('utilerias');
    }

    public function index() {



        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }




        if ($this->request->isAJAX()) {
            $datos = $this->choferes->mdlGetChoferes($empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
        $titulos["title"] = lang('choferes.title');
        $titulos["subtitle"] = lang('choferes.subtitle');
        return view('julio101290\boilerplatedrivers\Views\choferes', $titulos);
    }

    /**
     * Read Choferes
     */
    public function getChoferes() {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        $idChoferes = $this->request->getPost("idChoferes");
        $datosChoferes = $this->choferes->whereIn('idEmpresa', $empresasID)
                        ->where("id", $idChoferes)->first();

        if ($datosChoferes["PaisFigura"] != NULL 
            && $datosChoferes["PaisFigura"] != ""
             && $datosChoferes["PaisFigura"] != "null"
        ) {

            $datosPaises = $this->catalogosSAT->paises40()->obtain($datosChoferes["PaisFigura"]);
            $datosChoferes["nombrePais"] = $datosPaises->texto();
        } else {
            $datosChoferes["nombrePais"] = "";
        }



        if ($datosChoferes["EstadoFigura"] != NULL
             && $datosChoferes["EstadoFigura"] != ""
             && $datosChoferes["EstadoFigura"] != "null"
            
            ) {

            $datosEstado = $this->catalogosSAT->estados40()->obtain($datosChoferes["EstadoFigura"], $datosChoferes["PaisFigura"]);
            $datosChoferes["nombreEstado"] = $datosEstado->texto();
        } else {
            $datosChoferes["nombreEstado"] = "";
        }



        if ($datosChoferes["MunicipioFigura"] != NULL
            && $datosChoferes["MunicipioFigura"] != ""
             && $datosChoferes["MunicipioFigura"] != "null"
            
            ) {

            $datosMunicipio = $this->catalogosSAT->municipios40()->obtain($datosChoferes["MunicipioFigura"], $datosChoferes["EstadoFigura"]);
            $datosChoferes["nombreMunicipio"] = $datosMunicipio->texto();
        } else {
            $datosChoferes["nombreMunicipio"] = "";
        }

        echo json_encode($datosChoferes);
    }

    /**
     * Save or update Choferes
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();
        if ($datos["idChoferes"] == 0) {

            //BUSCAR SI EXITE CHOFER CON EL MISMO NOMBRE

            $nombreBusqueda["nombre"] = $datos["nombre"];
            $nombreBusqueda["Apellido"] = $datos["Apellido"];

            $choferPorNombre = $this->choferes->select("*")->where($nombreBusqueda)->countAllResults();

            //BUSCAR SI EXISTE CHOFER CON EL MISMO APELLIDO

            $choferPorApellido = $this->choferes->select("*")->where("Apellido", $datos["Apellido"])->countAllResults();

            if ($choferPorNombre > 0) {


                echo "El nombre y apellido estan repetidos no se puede registrar";

                return;
            }


            try {
                if ($this->choferes->save($datos) === false) {
                    $errores = $this->choferes->errors();
                    foreach ($errores as $field => $error) {
                        echo $error . " ";
                    }
                    return;
                }
                $dateLog["description"] = lang("vehicles.logDescription") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Guardado Correctamente";
            } catch (\PHPUnit\Framework\Exception $ex) {
                echo "Error al guardar " . $ex->getMessage();
            }
        } else {



            //BUSCAR SI EXITE CHOFER CON EL MISMO NOMBRE

            $nombreBusqueda["nombre"] = $datos["nombre"];
            $nombreBusqueda["Apellido"] = $datos["Apellido"];

            $choferPorNombre = $this->choferes->select("*")
                    ->where($nombreBusqueda)
                    ->where("id <>", $datos["idChoferes"])
                    ->countAllResults();

            if ($choferPorNombre > 0) {


                echo "El nombre y apellido estan repetidos no se puede registrar";

                return;
            }


            if ($this->choferes->update($datos["idChoferes"], $datos) == false) {
                $errores = $this->choferes->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("choferes.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Get Custumers via AJax
     */
    public function getChoferesAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();
        $custumers = new ChoferesModel();
        $idEmpresa = $postData['idEmpresa'];

        if (!isset($postData['searchTerm'])) {
            // Fetch record

            $listCustumers = $custumers->select('id,nombre,apellido')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->orderBy('id')
                    ->orderBy('nombre')
                    ->orderBy('apellido')
                    ->findAll(50);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record

            $listCustumers = $custumers->select('id,nombre,apellido')->where("deleted_at", null)
                    ->where('idEmpresa', $idEmpresa)
                    ->groupStart()
                    ->like('nombre', $searchTerm)
                    ->orLike('id', $searchTerm)
                    ->orLike('apellido', $searchTerm)
                    ->groupEnd()
                    ->findAll(50);
        }

        $data = array();
        foreach ($listCustumers as $custumers) {
            $data[] = array(
                "id" => $custumers['id'],
                "text" => $custumers['id'] . ' ' . $custumers['nombre'] . ' ' . $custumers['apellido'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

    /**
     * Delete Choferes
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $infoChoferes = $this->choferes->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->choferes->delete($id)) {
            return $this->failNotFound(lang('choferes.msg.msg_get_fail'));
        }
        $this->choferes->purgeDeleted();
        $logData["description"] = lang("choferes.logDeleted") . json_encode($infoChoferes);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('choferes.msg_delete'));
    }
}
