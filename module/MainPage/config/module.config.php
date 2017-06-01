<?php
namespace MainPage;


use Zend\Router\Http\Segment;

use Zend\ServiceManager\Factory\InvokableFactory;


return [
    //  'controllers' => [
    //     'factories' => [
    //         Controller\ListController::class => InvokableFactory::class,
    //     ],
    // ],
    
    'router' => [
      
        'routes' => [
           
            'mainpage' => [
               
                'type'    => Segment::class,
                'options' => [
                    'route' => '/mainpage[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\MainPageController::class,
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