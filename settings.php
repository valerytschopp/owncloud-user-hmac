<?php

/**
 * ownCloud - user_hmac
 *
 * @author Valery Tschopp <valery.tschopp@switch.ch>
 * @copyright 2014 SWITCH http://www.switch.ch
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

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
