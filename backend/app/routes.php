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
 * Time: 21:59
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/** @var $app \Silex\Application */
$app->get("/", 'IWD\\JOBINTERVIEW\\Routes\\Description::home')->bind('api_home');

$app->get("/surveys", "IWD\\JOBINTERVIEW\\Routes\\Services\\Surveys::home")->bind('api_surveys');
$app->get("/surveys/details", "IWD\\JOBINTERVIEW\\Routes\\Services\\Surveys::details")->bind('api_surveys_details');
$app->get("/surveys/aggregate", "IWD\\JOBINTERVIEW\\Routes\\Services\\Surveys::aggregate")->bind('api_surveys_aggregate');

$app->get("/surveys/{id}", "IWD\\JOBINTERVIEW\\Routes\\Services\\Surveys::getById")->bind('api_surveys_by_id');

// Allow * for access control origin for all api requests
$app->after(function (Request $request, Response $response) {
    $response->headers->set('Access-Control-Allow-Origin', '*');
});

//  If request body is json format then replace content by the array value of the json body
$app->before(function (Request $request) {
    $headers = $request->headers;
    if ($headers->has('Content-Type') && $headers->get('Content-Type') == 'application/json') {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : []);
    }
});