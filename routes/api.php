<?php

$app->get('/', 'HomeController:homepage');

$app->group('/api/v1', function () {
    $this->get('/', 'ApiController:index');
});
