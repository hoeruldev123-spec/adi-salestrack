<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class CustomerController extends ResourceController
{
    protected $modelName = 'App\Models\CustomerModel';
    protected $format    = 'json';

    // GET /api/customers
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /api/customers/{id}
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) return $this->failNotFound('Customer not found');
        return $this->respond($data);
    }

    // POST /api/customers
    public function create()
    {
        $data = $this->request->getJSON(true);
        $this->model->insert($data);
        return $this->respondCreated(['status' => 'success', 'message' => 'Customer created']);
    }

    // PUT /api/customers/{id}
   public function update($id = null)
{
    $data = $this->request->getJSON();

    $updateData = [
        'name'    => $data->name ?? null,
        'address' => $data->address ?? null,
        'phone'   => $data->phone ?? null,
    ];

    if ($this->model->update($id, $updateData)) {
        return $this->respond([
            'status'  => 200,
            'message' => 'Customer updated successfully',
            'data'    => $updateData
        ]);
    }

    return $this->fail('Failed to update customer');
}


    // DELETE /api/customers/{id}
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Customer not found');
        }
        $this->model->delete($id);
        return $this->respondDeleted(['status' => 'success', 'message' => 'Customer deleted']);
    }
}
