<?php

namespace Amethyst\Observers;

use Amethyst\Models\MorphToRelation;

class MorphToRelationObserver
{
    /**
     * Handle the MorphToRelation "saved" event.
     *
     * @param \Amethyst\Models\MorphToRelation $relation
     */
    public function saved(MorphToRelation $relation)
    {
        if (isset($relation->getOriginal()['name'])) {
            $oldName = $relation->getOriginal()['name'];

            if ($relation->name !== $oldName) {
                app('amethyst.morph-to-relation')->unset($relation, $oldName);
            }
        }

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
