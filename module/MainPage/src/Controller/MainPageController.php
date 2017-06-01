<?php

namespace MainPage\Controller;


use MainPage\Model\MainPage;
use MainPage\Model\MainPageTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class MainPageController extends AbstractActionController
{
	
    private $table;
    public function __construct(MainPageTable $table) {
        $this->table = $table;
    }
    public function indexAction() {

   	 $mainpage = $this->table->fetchAll();

     $sale = $this->table->getSale();
     $rent = $this->table->getRent();
     

   	 return new ViewModel(['mainpage' => $mainpage,'sale' => $sale, 'rent' => $rent]);
   }
   public function detailAction() {

        $request = $this->getRequest();
        $id = (int) $this->params()->fromRoute('id', 0);
        $mainpage = $this->table->getMainPage($id);
    
    return new ViewModel(['mainpage' => $mainpage]);
   }

   
}