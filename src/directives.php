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

return [
    'set' => function ($expression) {
        list($variable, $value) = explode(', ', str_replace(['(', ')'], '', $expression));
        return "<?php {$variable} = {$value}; ?>";
    },
    'explode' => function ($expression) {
        list($delimiter, $string) = explode(', ', str_replace(['(', ')'], '', $expression));
        return "<?php echo explode({$delimiter}, {$string}); ?>";
    },
    'implode' => function ($expression) {
        list($delimiter, $array) = explode(', ', str_replace(['(', ')'], '', $expression));
        return "<?php echo implode({$delimiter}, {$array}); ?>";
    },
    'var_dump' => function ($expression) {
        return "<?php var_dump({$expression}); ?>";
    },
    'dd' => function ($expression) {
        return "<?php dd({$expression}); ?>";
    }
];
