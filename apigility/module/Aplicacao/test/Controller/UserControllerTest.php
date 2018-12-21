<?php
namespace AplicacaoTest\Controller;

use Aplicacao\V1\Rest\User;
use Aplicacao\V1\Rpc\HttpClient;
use Application\Controller\IndexController;
use Zend\Stdlib\ArrayUtils;
use Zend\Stdlib\Parameters;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class UserControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;

    public function setUp()
    {
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));
        parent::setUp();
    }
    
    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('application');
        $this->assertControllerName(IndexController::class);
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('home');
    }

    public function testGetUser()
    {
        // $this->getRequest()
        //     ->setMethod('POST')
        //     ->setPost(new Parameters(['name' => 'Req pelo teste']));

        $postParams = [
            'name' => 'Req pelo teste'
        ];

        $this->getRequest()->setMethod('POST')->setPost(new Parameters($postParams));

        $this->dispatch('/api/httpclient');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('application');
        $this->assertControllerName('application\controller\indexcontroller');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('home');
    }
}