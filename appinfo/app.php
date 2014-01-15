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

require_once OC_App::getAppPath('user_hmac') . '/user_hmac.php';

OC_APP::registerAdmin('user_hmac', 'settings');

OC_User::registerBackend('hmac');
OC_User::useBackend('hmac');

// add settings page to navigation
$entry = array(
        'id' => 'user_hmac_settings',
        'order' => 1,
        'href' => OC_Helper::linkTo( 'user_hmac', 'settings.php' ),
        'name' => 'user_hmac'
);
