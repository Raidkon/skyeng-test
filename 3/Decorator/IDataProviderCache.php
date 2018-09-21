<?php
/**
 * Created by PhpStorm.
 * User: Raidkon
 * E-mail: n@raidkon.com
 * Date: 21.09.2018
 * Time: 17:50
 */

namespace src\Decorator;

use Psr\Log\LoggerInterface;

interface IDataProviderCache
{
	/**
	 * @param LoggerInterface $logger
	 * @return void
	 */
	public function setLogger(LoggerInterface $logger);
	
	/**
	 * @param array $input
	 * @return mixed
	 */
	public function getResponse(array $input);
	
	/**
	 * @param array $input
	 * @return mixed
	 */
	public function getCacheKey(array $input);
}