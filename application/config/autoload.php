<?php
defined('BASEPATH') or exit('No direct script access allowed');


$autoload['packages'] = array();

$autoload['libraries'] = array('form_validation', 'session', 'database', 'email');


$autoload['drivers'] = array();


$autoload['helper'] = array('url', 'file', 'security', 'my_helper');


$autoload['config'] = array();


$autoload['language'] = array();


$autoload['model'] = array('AuthModel', 'UserModel', 'AdminModel', 'PostModel', 'ChatModel');
