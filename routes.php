<?php

return [
    'GET' => [
        '/authors' => 'index',
        '/authors/{id}' => 'show',
    ],
    'POST' => [
        '/authors' => 'store',
    ],
    'PUT' => [
        '/authors/{id}' => 'update',
    ],
    'DELETE' => [
        '/authors/{id}' => 'destroy',
    ],
];