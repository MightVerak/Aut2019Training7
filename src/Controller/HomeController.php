<?php
namespace App\Controller;

use App\Controller\AppController;


class HomeController  extends AppController
{

    public function initialize()
{
    parent::initialize();
    $this->Auth->allow(['index']);
}
    public function index(){
        $this->Auth->allow(['index']);
    }
}