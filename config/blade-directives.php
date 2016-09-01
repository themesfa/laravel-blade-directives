<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Directives
    |--------------------------------------------------------------------------
    |
    | custom your our own directives using proper handler
    |
    */    	 
    'directives' => [
        'set' => function ($expression) {
            list($variable, $value) = explode(', ', str_replace(['(', ')'], '', $expression));
            return "<?php {$variable} = {$value}; ?>";
        }
    ],

    /*
    |--------------------------------------------------------------------------
    | Exclude
    |--------------------------------------------------------------------------
    |
    | exclude directives
    |
    */
    'exclude' => []
    
];