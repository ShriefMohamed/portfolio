<?php

use Framework\Lib\AbstractModel;
use Framework\Lib\Database;
use Framework\Lib\FrontController;
use Framework\Lib\Session;


ob_start();

// set displaying error to 1 (1 display) (0 don't display)
ini_set('display_errors', 1);

ini_set('session.cookie_httponly', 1);

// define some of the necessary directories and paths so it be easier later to call them
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('APP_PATH') ? null : define('APP_PATH', realpath(dirname(__file__)) .DS);
defined('HOST_NAME') ? null : define('HOST_NAME', 'http://' . $_SERVER['HTTP_HOST'] . '/');
defined('CURRENT_URI') ? null : define('CURRENT_URI', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

define('LIB_PATH', APP_PATH . 'lib' .DS);
define('MODELS_PATH', APP_PATH . 'models' .DS);
define('VIEWS_PATH', APP_PATH . 'views' .DS);
define('CONTROLLERS_PATH', APP_PATH . 'controllers' .DS);
define('TEMPLATE_PATH', VIEWS_PATH . '_template' .DS);

define('SESSIONS_PATH', APP_PATH . 'sessions' );

define('LOG_FILE', APP_PATH . date('F-Y').".log");

define('PUBLIC_PATH', APP_PATH . '..' . DS);
//define('PUBLIC_PATH', APP_PATH . '..' . DS . 'public_html' . DS . 'public' .DS);
define('IMAGES_PATH', PUBLIC_PATH . 'images' .DS);
define('EMAIL_TEMPLATES_PATH', APP_PATH . 'templates' . DS);

define('PUBLIC_DIR', HOST_NAME);
//define('PUBLIC_DIR', HOST_NAME . 'public/');
define('IMAGES_DIR', PUBLIC_DIR . 'images/');

// define server timestamp & DateTime format
defined('SERVER_TIMESTAMP') ? null : define('SERVER_TIMESTAMP', $_SERVER['REQUEST_TIME']);

defined('DATE_TIME_FORMAT') ? null : define('DATE_TIME_FORMAT', 'd-m-Y H:i:s');
defined('DATE_FORMAT') ? null : define('DATE_FORMAT', 'd-m-Y');
defined('TIME_FORMAT') ? null : define('TIME_FORMAT', 'H:i:s');

// define encryption key and algorithm for openssl & hash_hmac
define('CIPHER_KEY', '?$@MK"<2B;V\)*#*');
define('CIPHER_ALGORITHM', 'aes-128-cbc');
define('HMAC_ALGORITHM', 'sha256');
define('HMAC_KEY', '?$@MK"<2B;V\)*#*');

// define the database credentials to use later at the database class
define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');

//define('DB_NAME', 'shriefmo_main');
//define('DB_USER', 'shriefmo_admin');
//define('DB_PASSWORD', '9aTFga4c^82@');

// define SMTP configuration
define('SMTP_SERVER', 'exchange');
define('SMTP_BACKUP_SERVER', 'exchange');
define('SMTP_USERNAME', 'username');
define('SMTP_PASSWORD', 'smtp');

//define('SMTP_SERVER', 'exchange.cyw.net.au');
//define('SMTP_BACKUP_SERVER', 'exchange.cyw.net.au');
//define('SMTP_USERNAME', 'jobs@tdljreid.com.au');
//define('SMTP_PASSWORD', 'smtp@tdljreid!2019');

define('SMTP_ENCRYPTION', 'tls');
define('SMTP_PORT', 587);

define('CONTACT_EMAIL', 'hey@shrief.me');
define('CONTACT_NAME', 'Shrief Mohamed');



// require autoload so the Classes get called automatically without the need of "require" or "include"
if (file_exists(APP_PATH . DS . 'lib' . DS . 'autoload.php')) {
	require_once APP_PATH . DS . 'lib' . DS . 'autoload.php';
}

// start the session for the whole website so we can use $_SESSION anywhere in the website without starting it again
$session = new Session();
$session->Initiate();

// put the database connection in the AbstractModel class
// the abstract model is the main model that all the other model classes will extend,
// and the models are the only classes that interacts with the database so by adding the database connection at
// the abstract model then every model class will have access to the database connection
AbstractModel::$db = Database::CreateConnection();

// call the FrontController class which is the class that will take the url and then require the right files and classes
$FrontController = new FrontController;

ob_end_flush();
