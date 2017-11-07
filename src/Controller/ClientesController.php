<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 */
class ClientesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index() {
        $this->loadModel('Clientes');
    }

    /*
     * Funcion que guarda los datos del cliente en la base de datos
     */

    public function nuevoCliente() {
        $this->log('Datos del nuevo cliente: ' . print_r($this->request->getData(), true), 'debug');
        $this->log('Datos del nuevo cliente: ' . print_r($this->request->data, true), 'debug');
        $this->log('Datos del nuevo cliente: ' . print_r($_POST, true), 'debug');
        $this->loadModel('Clientes'); 
        $this->loadModel('Domicilios');
        $this->loadModel('Mails');
        $this->loadModel('Telefonos');
        
        
        if(!empty($this->request->getData())){
            
            $data = $this->request->getData();
            
            
            
        }
    }
}
