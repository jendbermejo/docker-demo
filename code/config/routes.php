<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->group(
    '/api/{itemUuid:[a-z0-9\-]+}',
    function(){
        $this->get(
            '', 
            function (Request $request, Response $response, array $args) {
                return $response->withJson(
                    $this
                        ->get('stockService')
                        ->get($args['itemUuid'])
                );
            }
        );

        $this->put(
            '',
            function (Request $request, Response $response, array $args) {
                $stockInfo = 

                $this
                    ->get('stockService')
                    ->save(
                        $args['itemUuid'], 
                        json_decode(
                            $request
                                ->getBody()
                                ->getContents(),
                            true
                        )            
                    );
            }
        );
    }
);
