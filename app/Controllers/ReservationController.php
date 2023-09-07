<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use CodeIgniter\RESTful\ResourceController;

class ReservationController extends ResourceController
{
    protected $modelName    = 'App\Models\ReservationModel';
    protected $format       = 'json';
    private $reservation;

    public function __construct()
    {
        $this->reservation = new ReservationModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data   = [
            'message'           => 'success',
            'data_reservation'  => $this->model->orderBy('id')->findAll()
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $reservation = $this->reservation->find($id);
        if ($reservation) {
            return $this->respond($reservation);
        }
        return $this->failNotFound('Sorry! no reservation found');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = $this->validate([
            'name'      => 'required',
            'message'   => 'required',
        ]);
        
        if( !$rules ){
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $arrData = [
            'name'      => $this->request->getVar('nama'),
            'message'   => $this->request->getVar('ucapan'),
            'confirm'   => $this->request->getVar('konfirmasi'),
        ];

        $dataID = $this->reservation->insert($arrData);
        if ($dataID) {
            $arrData['id'] = $dataID;
            return $this->respondCreated($arrData);
        }
        return $this->fail('Sorry! no reservation created');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
