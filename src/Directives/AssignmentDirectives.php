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

namespace Wilsonpinto\Blade\Directives;

use Illuminate\Contracts\Foundation\Application;

class AssignmentDirectives
{

     /**
     * Register custom blade directives.
     *
     * @param  \Illuminate\Contracts\Foundation\Application $app
     * @param  array $config
     * @return void
     */
    public static function register(Application $app, $config)
    {
        $blade = $app->make('view')->getEngineResolver()->resolve('blade')->getCompiler();

        $directives = array_merge(
            $app->make('files')->getRequire(__DIR__ . '/../directives.php'),
            $config['directives']
        );
        
        $excludeDirectives = $config['exclude'];

        foreach ($directives as $name => $directive) {
            if (in_array($name, $excludeDirectives)) {
                continue;
            }
            $blade->directive($name, $directive);
        }
    }
}
