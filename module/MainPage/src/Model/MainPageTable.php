<?php

namespace MainPage\Model;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGatewayInterface;

class MainPageTable {

	private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {   

        $this->tableGateway = $tableGateway;
    }
    public function fetchAll()
    {
        return $this->tableGateway->select();
    }
    public function getSale($paginated=false)
    {
        if ($paginated) {
             
             $select = new Select('mainpage');

             $resultSetPrototype = new ResultSet();

             $resultSetPrototype->setArrayObjectPrototype(new MainPage());
             
             $paginatorAdapter = new DbSelect(
                
                 $select,
                
                 $this->tableGateway->getAdapter(),
                 
                 $resultSetPrototype
             );
             $paginator = new Paginator($paginatorAdapter);
             return $paginator;
         }
        $rowset = $this->tableGateway->select(['sale_rent' => 'sale']);
       
        return $rowset;
    }
    public function getRent()
    {
        
        $rowset = $this->tableGateway->select(['sale_rent' => 'rent']);
       
        return $rowset;
    }
    public function getMainPage($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        return $row;
    }
}