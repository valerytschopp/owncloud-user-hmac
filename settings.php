<?php

OCP\User::checkAdminUser();

// param => default
$params = array(
	'user_hmac_key' => 'TODO_GENERATE_A_SHARED_KEY',
       	'user_hmac_hash_algorithm' => 'sha256',
	);

if ($_POST) {
	OCP\Util::callCheck();
	foreach($params as $param => $default) {
		if (isset($_POST[$param])) {
			OCP\Config::setAppValue('user_hmac', $param, $_POST[$param]);
		}
	}
}

$tmpl = new OCP\Template( 'user_hmac', 'settings');
$tmpl->assign('requesttoken', OCP\Util::callRegister());
//OCP\Util::addScript('user_hmac', 'settings');
foreach($params as $param => $default) {
	$value = OCP\Config::getAppValue('user_hmac', $param, $default);
	$tmpl->assign($param, $value);
}

return $tmpl->fetchPage();
