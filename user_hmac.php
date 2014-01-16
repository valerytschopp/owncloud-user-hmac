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

class OC_USER_HMAC extends OC_User_Backend {
	protected $user_hmac_key;

	public function __construct() {
		$key_default = OC_Util::generateRandomBytes(32);
		$this->user_hmac_key = OCP\Config::getAppValue( 'user_hmac', 'user_hmac_key', $key_default );
	}

	public function checkPassword( $user, $password ) {
		$hmac = hash_hmac( 'sha256', $user, $this->user_hmac_key, true );	
		$b64hmac = base64_encode( $hmac );
		OCP\Util::writeLog('user_hmac', 'user: ' . $user . ' password: ' . $password . ' hmac: ' . $b64hmac, OCP\Util::DEBUG);
		return $b64hmac == $password;
	}

}
