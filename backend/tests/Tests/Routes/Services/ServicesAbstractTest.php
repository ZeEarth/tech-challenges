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
 * Date: 21/10/2017
 * Time: 16:59
 */

namespace IWD\JOBINTERVIEW\Tests\Routes\Services;

use IWD\JOBINTERVIEW\Routes\Services\ServicesAbstract;
use IWD\JOBINTERVIEW\Routes\Services\Surveys;

class ServicesAbstractTest extends \PHPUnit_Framework_TestCase
{
    public function testGetFunctionNameForUnknowProperty() {
        $app['services'] = [
            'surveys' => [
                'name' => 'Surveys',
                'endpoint' => '/surveys/{code}',
                'description' => 'Survey service',
                'version' => '1',
                'allowedMethods' => [
                    'GET',
                ],
                'unknownProperty' => 'propertyValue',
            ],
        ];

        $service = new Surveys($app['services']['surveys']);
    }
}
