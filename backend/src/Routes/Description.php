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
 * Date: 18/10/2017
 * Time: 22:22
 */

namespace IWD\JOBINTERVIEW\Routes;

use IWD\JOBINTERVIEW\Routes\Services\ServicesAbstract;
use Silex\Application;
use Silex\Route;
use Symfony\Component\HttpFoundation\Request;

class Description extends Route
{

    public function home(Request $request, Application $app)
    {
        $services = [];
        if (isset($app['services'])) {
            foreach ($app['services'] as $serviceName => $serviceOptions) {
                $className = __NAMESPACE__ . "\\Services\\" . ucfirst($serviceName);
                if (class_exists($className)) {
                    $serviceOptions = (array)$serviceOptions;
                    foreach ($serviceOptions as $options) {
                        /** @var ServicesAbstract $service */
                        $service = new $className($options);
                        array_push($services, $service->getArrayCopy());
                    }
                }
            }
        }
        return $app->json($services);
    }
}