<?php
namespace AplicacaoTest\Controller;

use Aplicacao\V1\Rest\User;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class UserControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;

    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            // Grabbing the full application configuration:
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));
        parent::setUp();

        // $services = $this->getApplicationServiceLocator();
        // $config = $services->get('config');
        // unset($config['db']);
        // $services->setAllowOverride(true);
        // $services->setService('config', $config);
        // $services->setAllowOverride(false);
    }
    
    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/api/user');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('User');
        $this->assertControllerName(UserController::class);
        $this->assertControllerClass('UserController');
        $this->assertMatchedRouteName('user');
    }
}