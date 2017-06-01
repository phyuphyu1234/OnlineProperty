<?php 
namespace PostMng;

use Zend\Router\Http\Segment;

use Zend\ServiceManager\Factory\InvokableFactory;


return [
    'router' => [
       
        'routes' => [
           
            'postmng' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/postmng[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PostController::class,
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