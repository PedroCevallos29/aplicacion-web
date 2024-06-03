<?php

namespace App\Models;

use CodeIgniter\Model;

class paciente extends Model
{
    protected $table            = 'clinica';
    protected $primaryKey       = 'id_clinica';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    protected $allowedFields    = ['apellido','id_paciente','nombre','cedula','domicilio'];

}
