<?php

namespace Amethyst\Providers;

use Amethyst\Common\CommonServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Amethyst\Observers\MorphToRelationObserver;
use Amethyst\Models\MorphToRelation;

class MorphToRelationServiceProvider extends CommonServiceProvider
{
	/**
     * @inherit
     */
    public function register()
    {
        parent::register();

        $this->app->singleton('amethyst.morph-to-relation', function ($app) {
            return new \Amethyst\Services\MorphToRelationService();
        });
    }

    /**
     * @inherit
     */
    public function boot()
    {
        parent::boot();

        MorphToRelation::observe(MorphToRelationObserver::class);

        if (Schema::hasTable(Config::get('amethyst.morph-to-relation.data.morph-to-relation.table'))) {
            app('amethyst.morph-to-relation')->boot();
        }
    }
}
