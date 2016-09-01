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

class AssignmentDirectives
{
    /**
     * Register custom blade directives.
     *
     * @param  \Illuminate\View\Compilers\BladeCompiler $blade
     * @param  array $directives
     *
     * @return void
     */
    public static function register($blade, array $directives)
    {
        foreach ($directives as $name => $directive) {
            $blade->directive($name, $directive);
        }
    }
}
