<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class clinicaController extends ResourceController
{

    protected $modelName = 'App\Models\clinica';
    protected $format    = 'json';


    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        // Devuelve todos los elementos consultados
        $datos = $this->model->findAll();
        return $this->respond($datos);
        
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        // Retorna solo 1 elemento
        $data = $this->model->find($id);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No se encuentra');
        }
    }

    

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        // Guarda en la DB
        $data = $this->request->getJSON();
        if ($this->model->insert($data)) {
            return $this->respondCreated($data);
        } else {
            return $this->failValidationErrors($this->model->errors());
        }
    }

    

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        // Acutaliza la DB
        $data = $this->request->getJSON();
        if ($this->model->update($id, $data)) {
            return $this->respond($data);
        } else {
            return $this->failValidationErrors($this->model->errors());
        }
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        // Elimina de la DB
        if ($this->model->delete($id)) {
            return $this->respondDeleted('Eliminado');
        } else {
            return $this->failNotFound('Error al eliminar');
        }
    }
}
