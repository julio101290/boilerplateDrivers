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
        $builder = $this->db->table('choferes a');

        $builder->select([
            'a.id AS id',
            'a.idEmpresa AS idEmpresa',
            'a.nombre AS nombre',
            'a.Apellido AS Apellido',
            'a.tipoFigura AS tipoFigura',
            'a.RFCFigura AS RFCFigura',
            'a.numLicencia AS numLicencia',
            'a.MunicipioFigura AS MunicipioFigura',
            'a.EstadoFigura AS EstadoFigura',
            'a.PaisFigura AS PaisFigura',
            'a.CodigoPostalFigura AS CodigoPostalFigura',
            'a.created_at AS created_at',
            'a.updated_at AS updated_at',
            'a.deleted_at AS deleted_at',
            'b.nombre AS nombreEmpresa'
        ]);

        $builder->join('empresas b', 'a.idEmpresa = b.id');
        $builder->whereIn('a.idEmpresa', $idEmpresas);

        return $builder;
    }
}
