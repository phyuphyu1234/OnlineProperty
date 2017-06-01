<?php
namespace OnlineProperty\Form;

use Zend\Form\Form;

class OnlinePropertyForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('onlineproperty');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'user_name',
            'type' => 'text',
            'options' => [
                'label' => 'Name',
            ],
        ]);
        $this->add([
            'name' => 'password',
            'type' => 'text',
            'options' => [
                'label' => 'Password',
            ],
        ]);
        $this->add([
            'name' => 'auth',
            'type' => 'text',
            'options' => [
                'label' => 'Auth',
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