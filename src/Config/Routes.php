<?php

$routes->group('admin', function ($routes) {


    $routes->resource('choferes', [
        'filter' => 'permission:choferes-permission',
        'controller' => 'choferesController',
        'except' => 'show',
        'namespace' => 'julio101290\boilerplatedrivers\Controllers',
    ]);
    
    $routes->post('choferes/save'
                , 'ChoferesController::save'
                ,['namespace' => 'julio101290\boilerplatedrivers\Controllers']
                );

    $routes->post('choferes/getChoferes'
                , 'ChoferesController::getChoferes'
                ,['namespace' => 'julio101290\boilerplatedrivers\Controllers']
                );

    $routes->post('choferes/getChoferesAjax'
                , 'ChoferesController::getChoferesAjax'
                ,['namespace' => 'julio101290\boilerplatedrivers\Controllers']
                );

});
