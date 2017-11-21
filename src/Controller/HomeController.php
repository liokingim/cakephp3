<?php
namespace App\Controller;

class HomeController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->name = "Home";
        $this->autoRender = false;
        $this->viewBuilder()->enableAutoLayout(false);
    }

    public function index() {
//        echo "Hello CakePHP World...";
//        $this->viewBuilder()->enableAutoLayout(false);
        $this->autoRender = true;
//        $this->redirect("/home/edit");
//        $this->redirect("https://www.google.com");
//        $this->setAction("edit");
    }
    
    public function edit() {
//        echo "list page...";
        $this->viewBuilder()->enableAutoLayout(false);
        $this->autoRender = true;
    }
}


