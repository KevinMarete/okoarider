<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*App*/
$config['client_id'] = 'djhANExD-jqMRdk-_DTq7PoE6it7VSdB';
$config['client_secret'] = '6xxUX3gn0qouyEn7Pmu6uthlEFQy5SCrKgesH03F';
$config['server_token'] = 'AIVmw6vg0VePk4moKMhVJ8uvpY_zgqx0jS0BjR8z';
$config['redirect_uri'] = 'http://localhost/OkoaRider/';
$config['auth_url'] = 'https://login.uber.com/oauth/v2/authorize';
$config['token_url'] = 'https://login.uber.com/oauth/v2/token';
$config['profile_url'] = 'https://api.uber.com/v1.2/me';
$config['history_url'] = 'https://api.uber.com/v1.2/history?limit=50';
$config['auth_request_url'] = $config['auth_url'].'?client_id='.$config['client_id'].'&response_type=code&redirect_uri='.$config['redirect_uri'];
$config['scope'] = 'history payment request';