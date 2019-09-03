<?php

namespace Amethyst\Tests;

use Amethyst\Models\MorphToRelation;
use Amethyst\Models\Foo;

class RelationTest extends BaseTest
{
    public function testDynamicRelations()
    {
        MorphToRelation::create([
            'name' => 'relations',
            'entity' => 'relation',
            'attribute' => 'source',
            'target' => 'foo'
        ]);

        $relation = MorphToRelation::create([
            'name' => 'targets',
            'entity' => 'relation',
            'attribute' => 'target',
            'target' => 'foo'
        ]);

        $this->assertTrue((new Foo)->hasDynamicRelation('targets'));
        $this->assertEquals(0, Foo::relations()->count());
        $this->assertEquals(0, Foo::targets()->count());

        $relation->delete();

        $this->assertFalse((new Foo)->hasDynamicRelation('targets'));
    }
}
