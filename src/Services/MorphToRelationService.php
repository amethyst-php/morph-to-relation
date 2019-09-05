<?php

namespace Amethyst\Services;

use Amethyst\Models\MorphToRelation;
use Illuminate\Database\Eloquent\Relations\Relation;

class MorphToRelationService
{
	public function boot()
	{
		MorphToRelation::all()->map(function (MorphToRelation $relation) {
			$this->set($relation, false);
		});
	}

	public function generate($target)
	{
		event(new \Railken\EloquentMapper\Events\EloquentMapUpdate($target));
	}

	public function set(MorphToRelation $relation, bool $event = true)
	{
		$model = $this->getEntityClass($relation->entity);
		$target = $this->getEntityClass($relation->target);

		if (!$model || !$target) {
			// Silent error, no needs to interrupt application for user-error
			return;
		}

        Relation::morphMap([
            $relation->target => $target,
        ]);

        $target::morph_many($relation->name, $model, $relation->attribute);

        app('amethyst')->putMorphListable($relation->entity, $relation->attribute, $relation->target);

        $event && $this->generate($relation->target);
	}

	public function unset(MorphToRelation $relation, string $oldName = null)
	{
		$model = $this->getEntityClass($relation->entity);
		$target = $this->getEntityClass($relation->target);

		if (!$model || !$target) {
			// Silent error, no needs to interrupt application for user-error
			return;
		}

		$target::removeRelation($oldName ? $oldName : $relation->name);

		$this->generate($relation->target);
	}

	public function getEntityClass(string $name) {
		return app('amethyst')->findModelByName($name);
	}
}