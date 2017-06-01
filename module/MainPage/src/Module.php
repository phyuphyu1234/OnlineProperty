<?php

namespace MainPage;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface 

{
	public function getConfig()
    {
       return include __DIR__ . '/../config/module.config.php';
    }
     public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\MainPageTable::class => function($container) {
                    $tableGateway = $container->get(Model\MainPageTableGateway::class);
                    return new Model\MainPageTable($tableGateway);
                },
                Model\MainPageTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\MainPage());
                    return new TableGateway('property', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\MainPageController::class => function($container) {
                    return new Controller\MainPageController(
                        $container->get(Model\MainPageTable::class)
                    );
                },
            ],
        ];
    }
}