<?php 
namespace PostMng\Model;

class PostMng{

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
            'id'              => $this->id,
            'type_name'       => $this->type_name,
            'price'           => $this->price,
            'location'        => $this->location,
            'photo'           => $this->photo,
            'contact_phnumber'=> $this->contact_phnumber,
            'contact_address' => $this->contact_address,
            'sale_rent'       => $this->sale_rent,
         ];
    }
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'type_name',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'price',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);
        $inputFilter->add([
            'name' => 'location',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);
        $inputFilter->add([
            'name' => 'photo',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}