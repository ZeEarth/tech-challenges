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
 * Time: 21:50
 */


use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

$app['debug'] = true;

ErrorHandler::register();
ExceptionHandler::register();

$app['services'] = [
    'surveys' => [
        [
            'name' => 'Surveys',
            'endpoint' => '/surveys',
            'description' => 'Survey service',
            'version' => '1',
            'allowedMethods' => [
                'GET',
            ],
        ],
        [
            'name' => 'Surveys Details',
            'endpoint' => '/surveys/details?code=XXX',
            'descriptions' => 'Get detailed surveys with all questions and answers - You can filter result by using Query params "code"',
            'version' => 1,
            'allowedMethods' => [
                'GET',
            ]
        ],
        [
            'name' => 'Surveys Aggregate Datas',
            'endpoint' => '/surveys/aggregate?code=XXX',
            'descriptions' => 'Get surveys with aggregate datas - You can filter result by using Query params "code"',
            'version' => 1,
            'allowedMethods' => [
                'GET',
            ]
        ],
    ],
];

$app['datas'] = [
    'adapters' => [
        'surveys' => [
            'mode' => 'File',
            'options' => [
                'path' => ROOT_PATH . '/data',
            ]
        ]
    ]
];

$app['dao.surveys'] = function ($app) {
    if (!isset($app['datas']) || !isset($app['datas']['adapters']) || !isset($app['datas']['adapters']['surveys'])) {
        return new \Exception("You an error in your configuration file, please check the file '" . ROOT_PATH . "app/app.php");
    }
    $directoryIterator = new \FilesystemIterator($app['datas']['adapters']['surveys']['options']['path']);
    return new \IWD\JOBINTERVIEW\Dao\Survey($directoryIterator);
};