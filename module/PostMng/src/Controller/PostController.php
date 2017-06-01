<?php
namespace PostMng\Controller;

use PostMng\Form\PostMngForm;
use PostMng\Model\PostMng;
use PostMng\Model\PostMngTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as AuthAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Session\Container;

class PostController extends AbstractActionController
{
 
    private $table;

    public function __construct(PostMngTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
   
    $paginator = $this->table->fetchAll(true);

   
    $page = (int) $this->params()->fromQuery('page', 1);
    $page = ($page < 1) ? 1 : $page;
    $paginator->setCurrentPageNumber($page);

    
    $paginator->setItemCountPerPage(5);

    return new ViewModel(['paginator' => $paginator]);
    }
    public function editAction()
    {
    $request = $this->getRequest();
    $id = (int) $this->params()->fromRoute('id', 0);
    $postmng=$this->table->getPostMng($id);
    $image=$postmng->photo;

    if (! $request->isPost()) {
            return ['postmng' => $postmng];
        }
         $photo=$_FILES['photo']['name'];
         $tmp=$_FILES['photo']['tmp_name'];

        if($photo==""){
            $postmng =new PostMng();
            $postmng->exchangeArray((Array)$request->getPost());
            $postmng->photo=$image;
            $this->table->savePostMng($postmng);
            return $this->redirect()->toRoute('postmng', ['action' => 'index']);    

        }else {
        move_uploaded_file($tmp, "C:/xampp/htdocs/zend4/public/img/$photo");
        $postmng = new PostMng();
        $postmng->exchangeArray((Array)$request->getPost());
        $postmng->photo=$photo;
        $this->table->savePostMng($postmng);
        return $this->redirect()->toRoute('postmng', ['action' => 'index']);
        }
    }
       public function deleteAction() {

        $id = (int) $this->params()->fromRoute('id', 0);
        $this->table->deletePostMng($id);
        return $this->redirect()->toRoute('postmng');
       }
     
}       
           

