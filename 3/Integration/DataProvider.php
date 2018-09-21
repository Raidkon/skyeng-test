<?php
/**
 * Created by PhpStorm.
 * User: Raidkon
 * E-mail: n@raidkon.com
 * Date: 21.09.2018
 * Time: 17:45
 */

namespace src\Integration;


class DataProvider implements IDataProvider
{
	/**
	 * @var string
	 */
	private $host;
	
	/**
	 * @var string
	 */
	private $user;
	
	/**
	 * @var string
	 */
	private $password;
	
	/**
	 * @param $host string
	 * @param $user string
	 * @param $password string
	 */
	public function __construct(string $host,string $user,string $password)
	{
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
	}
	
	/**
	 * @param array $request
	 *
	 * @return array
	 */
	public function get(array $request)
	{
		return [
			'key1' => 'val1',
			'key2' => 'val2'
		];
	}
}