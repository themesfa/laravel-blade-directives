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
    }
];
