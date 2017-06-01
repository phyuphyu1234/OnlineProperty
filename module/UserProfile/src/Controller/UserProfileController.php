<?php
namespace UserProfile\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use UserProfile\Model\UserProfile;
use UserProfile\Model\UserProfileTable;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as AuthAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\File\Transfer\Adapter\Http;
use Zend\Session\Container;

class UserProfileController extends AbstractActionController
{
   
    private $table;
    private $authAdapter;
    private $authService;

    public function __construct(UserProfileTable $table)
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

    public function indexAction() {
   
      $paginator = $this->table->getID();

      return new ViewModel(['paginator' => $paginator]);
    }

    public function deleteAction(){

        $id = (int) $this->params()->fromRoute('id', 0);
        $this->table->deleteUserProfile($id);

        return $this->redirect()->toRoute('userprofile');
    }

    public function addAction(){

        $request = $this->getRequest();
        if (! $request->isPost()) {
        return [];
        }
        $rr=$this->request->getPost();

        $photo=$_FILES['photo']['name'];
        $tmp=$_FILES['photo']['tmp_name'];
    
        move_uploaded_file($tmp, "C:/xampp/htdocs/zend4/public/img/$photo");

        $userprofile = new UserProfile();
        $userprofile->exchangeArray((Array)$request->getPost());
        $userprofile->photo=$photo;

        $this->table->saveUserProfile($userprofile);
       

        return $this->redirect()->toRoute('userprofile');
    }
    public function registerAction(){

              if(!$this->authService->hasIdentity()){
                  return $this ->redirect()
                               ->toRoute ('userprofile',['action'=>'login']);
              }

              if( $this->authService->hasIdentity())
              {
                echo "Welcome";
                print_r( $this->authService->getIdentity() );
              }else{
                 echo "Access denied";
              }
              $request = $this->getRequest();
              if (! $request->isPost()) {
                return [];
              }
             $userprofile = new UserProfile();
             $userprofile->exchangeArray((Array)$request->getPost());
             $this->table->saveUserProfile($userprofile);
             return $this->redirect()->toRoute('userprofile');
      }
      public function loginAction(){

        $request = $this->getRequest();
              if(! $request->isPost()){
              return[];
              }
              $auth = $request->getPost();
              $this->authAdapter
              ->setIdentity($auth->name)
              ->setCredential($auth->password);
              $result = $this->authService
              ->authenticate($this->authAdapter);

              if($result->isValid()){
              return $this->redirect()->toRoute('userprofile');
              }else{
              $error ="";
              foreach ($result-> getMessages() as $message) {
              $error.="$message";
              }
              return ['error' => $error]; 
              } 
      } 
      public function editAction(){

        $request = $this->getRequest();
        $id = (int) $this->params()->fromRoute('id', 0);
        $userprofile = $this->table->getUserProfile($id);
        $image=$userprofile->photo;

        if (! $request->isPost()) {
          return ['userprofile' => $userprofile];
        }

        $photo=$_FILES['photo']['name'];
        $tmp=$_FILES['photo']['tmp_name'];

        if($photo==""){
            $userprofile =new UserProfile();
            $userprofile->exchangeArray((Array)$request->getPost());
            $userprofile->photo=$image;
            $this->table->saveUserProfile($userprofile);
            return $this->redirect()->toRoute('userprofile', ['action' => 'index']);    

        }else {

        move_uploaded_file($tmp, "C:/xampp/htdocs/zend4/public/img/$photo");

        $userprofile =new UserProfile();
        $userprofile->exchangeArray((Array)$request->getPost());
        $userprofile->photo=$photo;
        $this->table->saveUserProfile($userprofile);

        return $this->redirect()->toRoute('userprofile', ['action' => 'index']);         
     }

    }
}
