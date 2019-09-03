<?php

return [
    'enabled'    => true,
    'controller' => Amethyst\Http\Controllers\Admin\MorphToRelationsController::class,
    'router'     => [
        'as'     => 'morph-to-relation.',
        'prefix' => '/morph-to-relations',
    ],
];
