<?php

use \Leo\Middlewares\XPoweredBy;
use \Leo\Fixtures\DummyRequestHandler;
use \PHPUnit\Framework\TestCase;
use \GuzzleHttp\Psr7;

/**
 * @testdox \Leo\Middlewares\XPoweredBy
 */
class XPoweredByTest extends TestCase
{
	private const POWERED_BY = 'AwesomeApplication/1.0';

	/**
	 * @testdox Set X-Powered-By Header
	 */
	public function testSetXPoweredByHeader():void
	{
		$handler = new DummyRequestHandler();
		$request = new Psr7\ServerRequest('GET', '/');
		$middleware = new XPoweredBy(self::POWERED_BY);

		$this->assertSame(
			self::POWERED_BY,
			$middleware->process($request, $handler)
				->getHeaderLine('X-Powered-By')
		);
	}
}

?>
