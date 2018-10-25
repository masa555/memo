<?php
namespace App\Controller;
//use App\Controller\AppController;

class AboutController extends AppController
{
    
    
    public function index(){
         
         $this->set(compact('index'));

         
    }
}