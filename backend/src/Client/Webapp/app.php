<?php
declare(strict_types=1);

if (file_exists(ROOT_PATH.'/vendor/autoload.php') === false) {
    echo "run this command first: composer install";
    exit();
}
require_once ROOT_PATH.'/vendor/autoload.php';

use Silex\Application;

$app = new Application();

require_once ROOT_PATH . '/app/app.php';
require_once ROOT_PATH . '/app/routes.php';

$app->run();
