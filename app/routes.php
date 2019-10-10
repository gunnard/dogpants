<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Application\Actions\Dogs\Dogs;

return function (App $app) {
    $container = $app->getContainer();


	$URI = '/api';
	$VER = '/v1';
	$URL = $URI . $VER;

	/**
	 * GET
	 */

    $app->get($URL . '/dogs', function (Request $request, Response $response) {
		$dogs = Dogs::class;
		$output = $dogs::getAllDogs();
		$response->getBody()->write( json_encode($output) );
		return $response
				->withHeader('Content-type', 'application/json');
    });

    $app->get($URL . '/dog/{id}', function (Request $request, Response $response) {
		$dogs = Dogs::class;
		$id = $request->getAttribute('id');
		$output = $dogs::getDog($id);
		$response->getBody()->write( json_encode($output) );
		return $response
			->withHeader('Content-type', 'application/json');
    });

    $app->get($URL . '/dogs/name/{name}', function (Request $request, Response $response) {
		$dogs = Dogs::class;
		$name = $request->getAttribute('name');
		$output = $dogs::getDogByName($name);
		$response->getBody()->write( json_encode($output) );
		return $response
			->withHeader('Content-type', 'application/json');
    });

    $app->get($URL . '/dogs/height/{height}', function (Request $request, Response $response) {
		$dogs = Dogs::class;
		$height = $request->getAttribute('height');
		$output = $dogs::getDogsByHeight($height);
		$response->getBody()->write( json_encode($output) );
		return $response
				->withHeader('Content-type', 'application/json');
    });

    $app->get($URL . '/dogs/lenth/{length}', function (Request $request, Response $response) {
		$dogs = Dogs::class;
		$length = $request->getAttribute('length');
		$output = $dogs::getDogsByLength($length);
		$response->getBody()->write( json_encode($output) );
		return $response
				->withHeader('Content-type', 'application/json');
    });

	/**
	 * POST
	 */

    $app->post($URL . '/dog/add/{name}/{height}/{length}', function (Request $request, Response $response) {
		$dogs = Dogs::class;
		$name = $request->getAttribute('name');
		$height = $request->getAttribute('height');
		$length = $request->getAttribute('length');
		$output = $dogs::addDog($name,$height,$length);
		$response->getBody()->write( json_encode($output) );
		return $response
				->withHeader('Content-type', 'application/json');
    });

    $app->post($URL . '/dog/update/{id}/{name}/{height}/{length}', function (Request $request, Response $response) {
		$dogs = Dogs::class;
		$id = $request->getAttribute('id');
		$name = $request->getAttribute('name');
		$height = $request->getAttribute('height');
		$length = $request->getAttribute('length');
		$output = $dogs::updateDog($id,$name,$height,$length);
		$response->getBody()->write( json_encode($output) );
		return $response
				->withHeader('Content-type', 'application/json');
    });


    $app->delete($URL . '/doggone/{id}', function (Request $request, Response $response) {
		$dogs = Dogs::class;
		$id = $request->getAttribute('id');
		$output = $dogs::dogGone($id);
		$response->getBody()->write( json_encode($output) );
		return $response
			->withHeader('Content-type', 'application/json');
    });
};
