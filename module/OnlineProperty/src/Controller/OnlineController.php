<?php

namespace OnlineProperty\Controller;

use OnlineProperty\Form\OnlinePropertyForm;
use OnlineProperty\Model\OnlineProperty;
use OnlineProperty\Model\OnlinePropertyTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as AuthAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Session\Container;

class OnlineController extends AbstractActionController
{
  // Add this property:
    private $table;
    private $authAdapter;
    private $authService;

    // Add this constructor:
    public function __construct(OnlinePropertyTable $table)
    {
        $this->table = $table;
        $this->authAdapter = new AuthAdapter(
        $this->table->getAdapter(),
          'user',
          'name',
          'password',
          'auth'
          );
        $this->authService=new AuthenticationService();
    } 
    public function indexAction()
    {
    // Grab the paginator from the OnlineTable:
    $paginator = $this->table->fetchAll(true);

    // Set the current page to what has been passed in query string,
    // or to 1 if none is set, or the page is invalid:
    $page = (int) $this->params()->fromQuery('page', 1);
    $page = ($page < 1) ? 1 : $page;
    $paginator->setCurrentPageNumber($page);

    // Set the number of items per page to 10:
    $paginator->setItemCountPerPage(5);

   
    if(!$this->authService->hasIdentity()){
        return $this ->redirect()
        ->toRoute ('onlineproperty',['action'=>'login']);
      }
       return new ViewModel(['paginator' => $paginator]);
    }
    
    public function deleteAction() {

    $id = (int) $this->params()->fromRoute('id', 0);
    $this->table->deleteOnlineProperty($id);
    return $this->redirect()->toRoute('onlineproperty');
   }
    public function addAction(){

    $onlineproperty = $this->table->fetchAll();

    return new ViewModel(['onlineproperty' => $onlineproperty]);
        
   }
    public function editAction(){

    $request = $this->getRequest();
    $id = (int) $this->params()->fromRoute('id', 0);
    $onlineproperty=$this->table->getOnlineProperty($id);

    if (! $request->isPost()) {
            return ['onlineproperty' => $onlineproperty];
        }

    $onlineproperty = new OnlineProperty();
    $onlineproperty->exchangeArray((Array)$request->getPost());

    $this->table->saveOnlineProperty($onlineproperty);
        return $this->redirect()->toRoute('onlineproperty', ['action' => 'index']);
   }

    public function loginAction(){

            $request = $this->getRequest();
            if(! $request->isPost()){
            return[];
            }
            $auth = $request->getPost();
            $this->authAdapter
                 ->setIdentity($auth->username)
                 ->setCredential($auth->password);
            $result= $this->authService
                           ->authenticate($this->authAdapter);
            $name=$this->authService->getIdentity();
            if($result->isValid()){
               $check=$this->table->fetchAll();
               foreach ($check as $checks) {
                 $username=$checks->name;
                 $userid=$checks->id;
                 $auth=$checks->auth;
                 $name=$this->authService->getIdentity();
                 if($username==$name)
                 {
                   $uid=$userid;
                   $uauth=$auth;
                 }   
               }
               $session = new Container('user');
               $session->offsetSet('id',$uid);
               $session->offsetSet('auth',$uauth);
               if($uauth=='1'){
                return $this->redirect()->toRoute('onlineproperty');
               
            }else
            {
               return $this->redirect()->toRoute('userprofile', ['action' => 'index']);
            }
            }else{
            $error ="";
            foreach ($result-> getMessages() as $message) {
            $error.="Sorry! Invalid Email or Password";
            }
            return ['error' => $error]; 
            } 
    }
    public function logoutAction(){

     $this->authService->clearIdentity();
     $session = new Container('user');
     $session->getManager()->destroy();
      
     return $this ->redirect()->toRoute ('onlineproperty',['action'=>'login']);
  
    }
    public function changepwAction(){
   
    $request = $this->getRequest();
    $id = (int) $this->params()->fromRoute('id', 0);
    $onlineproperty=$this->table->getOnlineProperty($id);

    if (! $request->isPost()) {
            return ['onlineproperty' => $onlineproperty];
        }

    $onlineproperty = new OnlineProperty();
    $onlineproperty->exchangeArray((Array)$request->getPost());

    $this->table->saveOnlineProperty($onlineproperty);

     return $this->redirect()->toRoute('onlineproperty', ['action' => 'index']);
       return new ViewModel(['onlineproperty' => $onlineproperty]);

   }
    public function registerAction(){
 
          $request = $this->getRequest();
          if (! $request->isPost()) {
            return [];
        }
         $onlineproperty = new OnlineProperty();
         $onlineproperty->exchangeArray((Array)$request->getPost());
        $this->table->saveOnlineProperty($onlineproperty);
        return $this->redirect()->toRoute('onlineproperty');
    }
}
