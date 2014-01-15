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
		$this->user_hmac_key = OCP\Config::getAppValue( 'user_hmac', 'user_hmac_key', 'UNDEFINED!' );
	}

	public function checkPassword( $uid, $password ) {
		foreach($_SERVER as $key => $value) {
			OC_Log::write('user_hmac', 'server: ' . $key . ' = ' . $value, OC_Log::DEBUG);
		}
		$digest = hash_hmac( 'sha256', $uid, $this->user_hmac_key, true );	
		$hmac = base64_encode( $digest );
		//$hmac = hash_hmac( 'sha256', $uid, $this->user_hmac_key, false );
		OC_Log::write('user_hmac', 'uid: ' . $uid . ' password: ' . $password . ' hmac: ' . $hmac, OC_Log::DEBUG);
		return $hmac == $password;

	}

	public function userExists( $uid ){
		return true;
	}

}
