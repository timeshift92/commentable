<?php

declare(strict_types=1);

namespace Benjivm\Commentable;

use Illuminate\Support\ServiceProvider;

class CommentableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/create_comments_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_comments_table.php'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../config/commentable.php' => config_path('commentable.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/commentable.php', 'commentable');
    }
}
