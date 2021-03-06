<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\UpdateUserAction;
use App\Application\Actions\JobDating\UpdateJobDatingAction;
use App\Application\Actions\JobDating\ListJobDatingAction;
use App\Application\Actions\JobDating\ViewJobDatingAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/jobdatings', function (Group $group) {
        $group->get('', ListJobDatingAction::class);
        $group->post('', function(){});
        $group->get('/{id}', function(){});
        $group->put('/{id}', function(){});
        $group->delete('/{id}', function(){});

        $group->post('/{id}/{listName}', function(){});

        $group->get('/{id}/{listName}/{listId}', function(){});
        $group->put('/{id}/{listName}/{listId}', function(){});
        $group->delete('/{id}/{listName}/{listId}', function(){});
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
        $group->put('/{id}', UpdateUserAction::class);
    });
};
