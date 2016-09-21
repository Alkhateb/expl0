<?php

$app->get('/', 'Controllers\Index:index');

$app->get('/transaction/{hash}', 'Controllers\Transaction:view');
$app->get('/block/{hash}', 'Controllers\Block:view');