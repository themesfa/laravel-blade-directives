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

class IteratorDirectives
{
    /**
     *
     * @param  \Illuminate\Filesystem\Filesystem $filesystem
     * @param  \Illuminate\Config\Repository $config
     * @return array
     */
    public static function get($filesystem, $config)
    {
        $customDirectives = array_merge(
            $filesystem->getRequire(__DIR__ . '/../directives.php'),
            $config->get('blade-directives.directives') ?: []
        );

        $excludeDirectives = $config->get('blade-directives.exclude') ?: [];

        $directives = [];
        foreach ($customDirectives as $name => $directive) {
            if (in_array($name, $excludeDirectives)) {
                continue;
            }
            $directives[$name] = $directive;
        }

        return $directives;
    }
}
