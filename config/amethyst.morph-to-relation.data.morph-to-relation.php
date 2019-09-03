<?php

return [
    'table'      => 'amethyst_morph_to_relations',
    'comment'    => 'MorphToRelation',
    'model'      => Amethyst\Models\MorphToRelation::class,
    'schema'     => Amethyst\Schemas\MorphToRelationSchema::class,
    'repository' => Amethyst\Repositories\MorphToRelationRepository::class,
    'serializer' => Amethyst\Serializers\MorphToRelationSerializer::class,
    'validator'  => Amethyst\Validators\MorphToRelationValidator::class,
    'authorizer' => Amethyst\Authorizers\MorphToRelationAuthorizer::class,
    'faker'      => Amethyst\Fakers\MorphToRelationFaker::class,
    'manager'    => Amethyst\Managers\MorphToRelationManager::class,
];
