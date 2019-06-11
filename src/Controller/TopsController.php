<?php
namespace App\Controller;
//use App\Controller\AppController;

class TopsController extends AppController
{
    
    
    public function index(){
         
         $this->set(compact('index'));

         
    }
}