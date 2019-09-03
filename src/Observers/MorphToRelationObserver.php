<?php

namespace Amethyst\Observers;

use Amethyst\Models\MorphToRelation;

class MorphToRelationObserver
{
    /**
     * Handle the MorphToRelation "created" event.
     *
     * @param \Amethyst\Models\MorphToRelation $relation
     */
    public function created(MorphToRelation $relation)
    {
        app('amethyst.morph-to-relation')->set($relation);
    }

    /**
     * Handle the MorphToRelation "updated" event.
     *
     * @param \Amethyst\Models\MorphToRelation $relation
     */
    public function updated(MorphToRelation $relation)
    {
        app('amethyst.morph-to-relation')->set($relation);
    }

    /**
     * Handle the MorphToRelation "deleted" event.
     *
     * @param \Amethyst\Models\MorphToRelation $relation
     */
    public function deleted(MorphToRelation $relation)
    {
        app('amethyst.morph-to-relation')->unset($relation);
    }
}
