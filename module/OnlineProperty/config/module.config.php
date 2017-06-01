<?php 
namespace OnlineProperty;

use Zend\Router\Http\Literal;

use Zend\Router\Http\Segment;

use Zend\ServiceManager\Factory\InvokableFactory;


return [
    'router' => [
        
        'routes' => [
           
            'onlineproperty' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/onlineproperty[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\OnlineController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
     'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];