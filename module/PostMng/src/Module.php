<?php
namespace PostMng;

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
                Model\PostMngTable::class => function($container) {
                    $tableGateway = $container->get(Model\PostMngTableGateway::class);
                    return new Model\PostMngTable($tableGateway);
                },
                Model\PostMngTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\PostMng());
                    return new TableGateway('property', $dbAdapter, null, $resultSetPrototype);
                },
            ],   
        ];
    }
    
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\PostController::class => function($container) {
                    return new Controller\PostController(
                        $container->get(Model\PostMngTable::class)
                    );
                },
            ],
        ];
    }

}