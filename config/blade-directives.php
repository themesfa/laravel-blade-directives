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
        'datetime'   => function($expression) {
            return "<?php echo $expression->format('m/d/Y H:i'); ?>";
        },
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