<?php

/**
 * This file is part of the Laravel Blade Directives library.
 *
 * @author     Wilson Pinto <wilsonpinto360@gmail.com>
 * @copyright  2016
 *
 * For the full copyright and license information,
 * please view the LICENSE.md file that was distributed
 * with this source code.
 */

namespace Wilsonpinto\Blade;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Wilsonpinto\Blade\Directives\AssignmentDirectives;

class BladeDirectivesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/blade-directives.php' => config_path('blade-directives.php')
        ], 'config');

        $config = array_merge(
            config('blade-directives') ?: [],
            [
                'directives' => config('blade-directives.directives') ?: [],
                'exclude' => config('blade-directives.exclude') ?: []
            ]
        );

        AssignmentDirectives::register($this->app, $config);
    }
}
