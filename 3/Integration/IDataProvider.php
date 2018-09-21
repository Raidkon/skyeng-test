<?php
/**
 * Created by PhpStorm.
 * User: Raidkon
 * E-mail: n@raidkon.com
 * Date: 21.09.2018
 * Time: 17:43
 */

namespace src\Integration;
/**
 * Interface IDataProvider
 * @package src\Integration
 */
interface IDataProvider
{
	public function get(array $request);
}