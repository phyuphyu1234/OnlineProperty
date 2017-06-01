<?php
namespace PostMng\Form;

use Zend\Form\Form;

class PostMngForm extends Form
{
    public function __construct($name = null)
    {
        
        parent::__construct('postmng');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'type_name',
            'type' => 'text',
            'options' => [
                'label' => 'Name',
            ],
        ]);
        $this->add([
            'name' => 'price',
            'type' => 'text',
            'options' => [
                'label' => 'Price',
            ],
        ]);
        $this->add([
            'name' => 'location',
            'type' => 'text',
            'options' => [
                'label' => 'Location',
            ],
        ]);
        $this->add([
            'name' => 'photo',
            'type' => 'file',
            'options' => [
                'label' => 'Photo',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Update',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}