<?php  
namespace PostMng\Model;

use RuntimeException;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class PostMngTable
{
    private $tableGateway;
    

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function deletePostMng($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }

    public function savePostMng(PostMng $postmng)
    {
        $data = [
            'type_name'       => $postmng->type_name,
            'price'           => $postmng->price,
            'location'        => $postmng->location,
            'sale_rent'       => $postmng->sale_rent,
            'contact_phnumber'=> $postmng->contact_phnumber,
            'contact_address' => $postmng->contact_address,
            'photo'           => "$postmng->photo"
            
        ];
        $id = (int) $postmng->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getPostMng($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update onlineproperty with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }
    public function getPostMng($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }
    public function getAdapter()
    {
        return $this->tableGateway->getAdapter();
    }
    public function fetchAll($paginated = false)
    {
        if ($paginated) {
            return $this->fetchPaginatedResults();
        }

        return $this->tableGateway->select();
    }

    private function fetchPaginatedResults()
    {
        // Create a new Select object for the table:
        $select = new Select($this->tableGateway->getTable());

        // Create a new result set based on the Album entity:
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new PostMng());

        // Create a new pagination adapter object:
        $paginatorAdapter = new DbSelect(
            // our configured select object:
            $select,
            // the adapter to run it against:
            $this->tableGateway->getAdapter(),
            // the result set to hydrate:
            $resultSetPrototype
        );

        $paginator = new Paginator($paginatorAdapter);
        return $paginator;
    }
   
 }