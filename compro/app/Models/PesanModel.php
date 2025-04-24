<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table            = 'tb_pesan';
    protected $primaryKey       = 'id_pesan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama', 
        'negara', 
        'no_hp', 
        'email', 
        'website', 
        'kategori', 
        'pesan'
    ];

    public function getNegaraData()
    {
        $data = $this->select('negara, COUNT(*) as count')
                     ->groupBy('negara')
                     ->findAll();
    
        $labels = [];
        $values = [];
    
        foreach ($data as $row) {
            $labels[] = $row['negara'];
            $values[] = $row['count'];
        }
    
        return [
            'labels' => $labels,
            'values' => $values
        ];
    }
    
    public function getKategoriData()
    {
        $data = $this->select('kategori, COUNT(*) as count')
                     ->groupBy('kategori')
                     ->findAll();
    
        $labels = [];
        $values = [];
    
        foreach ($data as $row) {
            $labels[] = $row['kategori'];
            $values[] = $row['count'];
        }
    
        return [
            'labels' => $labels,
            'values' => $values
        ];
    }
    
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
