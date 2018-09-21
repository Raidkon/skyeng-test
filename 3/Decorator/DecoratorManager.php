<?php
/**
 * Created by PhpStorm.
 * User: Raidkon
 * E-mail: n@raidkon.com
 * Date: 21.09.2018
 * Time: 17:49
 */


namespace src\Decorator;

use DateTime;
use Exception;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;
use src\Integration\DataProvider;
use src\Integration\IDataProvider;

class DecoratorManager extends DataProvider implements IDataProvider,IDataProviderCache
{
	/**
	 * @var CacheItemPoolInterface
	 */
	public $cache;
	
	/**
	 * @var LoggerInterface
	 */
	public $logger;
	
	
	/**
	 * DecoratorManager constructor.
	 * @param                        $host
	 * @param                        $user
	 * @param                        $password
	 * @param CacheItemPoolInterface $cache
	 */
	public function __construct($host, $user, $password, CacheItemPoolInterface $cache)
	{
		parent::__construct($host, $user, $password);
		$this->cache = $cache;
	}
	
	
	/**
	 * @param LoggerInterface $logger
	 */
	public function setLogger(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}
	
	/**
	 * @param array $input
	 * @return array
	 */
	public function getResponse(array $input)
	{
		try {
			$cacheKey = $this->getCacheKey($input);
			$cacheItem = $this->cache->getItem($cacheKey);
			if ($cacheItem->isHit()) {
				return $cacheItem->get();
			}
			
			$result = parent::get($input);
			
			$cacheItem
				->set($result)
				->expiresAt(
					(new DateTime())->modify('+1 day')
				);
			
			return $result;
		} catch (Exception $e) {
			if ($this->logger instanceof LoggerInterface)
			{
				$this->logger->critical($e->getMessage(),$e->getTrace());
			}
		}
		
		return [];
	}
	
	/**
	 * @param array $input
	 * @return mixed|string
	 */
	public function getCacheKey(array $input)
	{
		return md5(serialize($input));
	}
}