<?php

$app->get('/', 'Controllers\Index:index');

$app->get('/transaction/{hash}', 'Controllers\Transaction:view');
$app->get('/block/{hash}', 'Controllers\Block:view');
$app->get('/address', 'Controllers\Address:index');
$app->get('/address/{hash}', 'Controllers\Address:checkBalance');

$app->post('/block/save', 'Controllers\Block:save');