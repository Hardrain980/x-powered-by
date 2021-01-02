<?php

namespace Leo\Middlewares;

use \Psr\Http\Server\MiddlewareInterface;
use \Psr\Http\Server\RequestHandlerInterface;
use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;

class XPoweredBy implements MiddlewareInterface
{
	/**
	 * @var string Application name
	 */
	private string $powered_by;

	public function __construct(string $powered_by)
	{
		$this->powered_by = $powered_by;
	}

	public function process(
		ServerRequestInterface $request,
		RequestHandlerInterface $handler
	):ResponseInterface
	{
		return $handler->handle($request)
			->withHeader('X-Powered-By', $this->powered_by);
	}
}

?>
