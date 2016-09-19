<?php

$app->get('/', 'Controllers\Index:index');

$app->get('/transaction/{hash}', 'Controllers\Transaction:view');