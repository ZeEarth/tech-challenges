<?php
/**
 * ______      ______
 * | ___ \___  |  _  \
 * | |_/ ( _ ) | | | |
 * |    // _ \/\ | | |
 * | |\ \ (_>  < |/ /
 * \_| \_\___/\/___/
 *
 * Created by PhpStorm.
 * User: jndesjardins
 * Date: 20/10/2017
 * Time: 07:13
 */

namespace IWD\JOBINTERVIEW\Tests;


use Silex\Application;
use Silex\WebTestCase;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class AppTest extends WebTestCase
{

    /**
     * Creates the application.
     *
     * @return HttpKernelInterface
     */
    public function createApplication()
    {
        if ( !defined('ROOT_PATH') ) {
            define('ROOT_PATH', realpath('.'));
        }
        $app = new Application();

        require __DIR__."/../../app/app.php";
        require __DIR__."/../../app/routes.php";

        unset($app['exception_handler']);

        return $app;
    }

    /**
     * @param $url
     * @dataProvider provideUrls
     */
    public function testPageIsSuccessful($url) {
        $client = $this->createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function provideUrls(){
        return [
            ['/'],
            ['/surveys'],
            ['/surveys/details'],
            ['/surveys/details?code=XX2'],
            ['/surveys/details?code=XX2&test=test'],
            ['/surveys/details?test=test'],
            ['/surveys/aggregate'],
            ['/surveys/aggregate?code=XX2'],
        ];
    }
}