<?php 
namespace UserProfile;

use Zend\Router\Http\Literal;

use Zend\Router\Http\Segment;

use Zend\ServiceManager\Factory\InvokableFactory;


return [
    'router' => [
       
        'routes' => [
           
            'userprofile' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/userprofile[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\UserProfileController::class,
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