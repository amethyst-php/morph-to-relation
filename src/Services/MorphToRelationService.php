<?php

namespace Amethyst\Services;

use Amethyst\Models\MorphToRelation;
use Illuminate\Database\Eloquent\Relations\Relation;

class MorphToRelationService
{
	public function boot()
	{
		MorphToRelation::all()->map(function (MorphToRelation $relation) {
			$this->set($relation);
		});
	}

	public function generate($target)
	{
		event(new \Railken\EloquentMapper\Events\EloquentMapUpdate($target));
	}

	public function set(MorphToRelation $relation)
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

        $this->generate($target);
	}

	public function unset(MorphToRelation $relation)
	{
		$model = $this->getEntityClass($relation->entity);
		$target = $this->getEntityClass($relation->target);

		if (!$model || !$target) {
			// Silent error, no needs to interrupt application for user-error
			return;
		}

		$target::removeRelation($relation->name);

		$this->generate($target);
	}

	public function getEntityClass(string $name) {
		return app('amethyst')->findModelByName($name);
	}
}