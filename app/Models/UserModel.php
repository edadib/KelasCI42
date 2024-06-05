<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; // object
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'password', 'email', 'created_at', 'updated_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at'; // untuk soft delete

    // Validation
    protected $validationRules      = [
        'name' => 'required|string',
        'email' => 'required|valid_email',
        'password' => 'required|integer',
    ];

    protected $validationMessages   = [
        'name' => [
            'required' => 'Nama wajib diisi',
            'alpha' => 'Nama tidak boleh ada nombor',
        ],
        'email' => [
            'required' => 'Email wajib diisi',
        ],
        'password' => [
            'required' => 'Password wajib diisi',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];//['encrypt_pass'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];//['encrypt_pass'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // function encrypt_pass()
    // {
    //     $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //     // dd($_POST);
    //     // return $_POST;
    // }
}
