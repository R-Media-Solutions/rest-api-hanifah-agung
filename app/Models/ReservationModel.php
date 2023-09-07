<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table            = 'reservation';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['name', 'message', 'confirm'];

    // Dates
    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
}
