<?php

namespace julio101290\boilerplatedrivers\Models;


use CodeIgniter\Model;

class ChoferesModel extends Model {

    protected $table = 'choferes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id'
        , 'idEmpresa'
        , 'nombre'
        , 'Apellido'
        , 'tipoFigura'
        , 'RFCFigura'
        , 'numLicencia'
        , 'MunicipioFigura'
        , 'EstadoFigura'
        , 'PaisFigura'
        , 'CodigoPostalFigura'
        , 'created_at'
        , 'updated_at'
        , 'deleted_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlGetChoferes($idEmpresas) {

        $result = $this->db->table('choferes a, empresas b')
                ->select('a.id
                         ,a.idEmpresa
                         ,a.nombre
                         ,a.Apellido
                         ,a.tipoFigura
                         ,a.RFCFigura
                         ,a.numLicencia
                         ,a.MunicipioFigura
                         ,a.EstadoFigura
                         ,a.PaisFigura
                         ,a.CodigoPostalFigura

                         ,a.created_at
                         ,a.updated_at
                         ,a.deleted_at 
                         ,b.nombre as nombreEmpresa')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->whereIn('a.idEmpresa', $idEmpresas);

        return $result;
    }
}
