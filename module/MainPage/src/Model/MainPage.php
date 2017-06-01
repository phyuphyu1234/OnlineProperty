<?php 
namespace MainPage\Model;

class MainPage{

    public $id;
    public $type_name;
    public $price;
    public $location;
    public $photo;
    public $contact_phnumber;
    public $contact_address;
    public $sale_rent;

    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->id               = !empty($data['id']) ? $data['id'] : null;
        $this->type_name        = !empty($data['type_name']) ? $data['type_name'] : null; 
        $this->price            = !empty($data['price']) ? $data['price'] : null;  
        $this->location         = !empty($data['location']) ? $data['location'] : null; 
        $this->photo            = !empty($data['photo']) ? $data['photo'] : null;   
        $this->contact_phnumber = !empty($data['contact_phnumber']) ? $data['contact_phnumber'] : null;       
        $this->contact_address  = !empty($data['contact_address']) ? $data['contact_address'] : null;
        $this->sale_rent        = !empty($data['sale_rent']) ? $data['sale_rent'] : null;                      
    }
    public function getArrayCopy()
    {
        return [
            'id'                => $this->id,
            'type_name'         => $this->type_name,
            'price'             => $this->price,
            'location'          => $this->location,
            'photo'             => $this->photo,
            'contact_phnumber'  => $this->contact_phnumber,
            'contact_address'   => $this->contact_address,
            'sale_rent'         => $this->sale_rent,
         ];
    }
}