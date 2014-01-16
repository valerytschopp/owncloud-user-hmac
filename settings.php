<?php

OCP\User::checkAdminUser();

$param = 'user_hmac_key';

if ($_POST) {
	OCP\Util::callCheck();
	if (isset($_POST[$param])) {
		OCP\Config::setAppValue('user_hmac', $param, $_POST[$param]);
	}
}


$tmpl = new OCP\Template( 'user_hmac', 'settings');
$tmpl->assign('requesttoken', OCP\Util::callRegister());
//OCP\Util::addScript('user_hmac', 'settings');

$value = OCP\Config::getAppValue('user_hmac', $param);
$tmpl->assign($param, $value);

return $tmpl->fetchPage();
