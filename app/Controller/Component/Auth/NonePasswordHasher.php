<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         CakePHP(tm) v 2.4.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AbstractPasswordHasher', 'Controller/Component/Auth');
/**
 * Abstract password hashing class
 *
 * @package       Cake.Controller.Component.Auth
 */
class NonePasswordHasher extends AbstractPasswordHasher {

/**
 * Configurations for this object. Settings passed from authenticator class to
 * the constructor are merged with this property.
 *
 * @var array
 */
	protected $_config = array('hashType' => null);

/**
 * Constructor
 *
 * @param array $config Array of config.
 */

/**
 * Get/Set the config
 *
 * @param array $config Sets config, if null returns existing config
 * @return array Returns configs
 */

/**
 * Generates password hash.
 *
 * @param string|array $password Plain text password to hash or array of data
 *   required to generate password hash.
 * @return string Password hash
 */
	public function hash($password) {
            return $password;
        }

/**
 * Check hash. Generate hash from user provided password string or data array
 * and check against existing hash.
 *
 * @param string|array $password Plain text password to hash or data array.
 * @param string Existing hashed password.
 * @return boolean True if hashes match else false.
 */
	public function check($password, $hashedPassword) {
            return $hashedPassword === $password;
        }

}
