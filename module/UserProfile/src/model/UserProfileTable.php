<?php  
namespace UserProfile\Model;
use RuntimeException;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Session\Container;


class UserProfileTable
{
    private $tableGateway;
    

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function deleteUserProfile($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
    public function saveUserProfile(UserProfile $userprofile)
    {
        $data = [
            'user_id'         => $userprofile->user_id,
            'type_name'       => $userprofile->type_name,
            'price'           => $userprofile->price,
            'location'        => $userprofile->location,
            'contact_phnumber'=> $userprofile->contact_phnumber,
            'contact_address' => $userprofile->contact_address,
            'sale_rent'       => $userprofile->sale_rent,
            'photo'           => "$userprofile->photo"
           
        ];
        $id = (int) $userprofile->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getUserProfile($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update userprofile with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }
    public function getUserProfile($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
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
        $resultSetPrototype->setArrayObjectPrototype(new UserProfile());

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
    public function getID()
    {
        $session = new Container('user');
        $id = $session->id;
        $rowset = $this->tableGateway->select(['user_id' => $id ]);
        
        return $rowset;
    }
}
