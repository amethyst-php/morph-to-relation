<?php

namespace Amethyst\Authorizers;

use Railken\Lem\Authorizer;
use Railken\Lem\Tokens;

class MorphToRelationAuthorizer extends Authorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'morph-to-relation.create',
        Tokens::PERMISSION_UPDATE => 'morph-to-relation.update',
        Tokens::PERMISSION_SHOW   => 'morph-to-relation.show',
        Tokens::PERMISSION_REMOVE => 'morph-to-relation.remove',
    ];
}
