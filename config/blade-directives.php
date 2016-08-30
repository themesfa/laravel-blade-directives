<?php

return [
    
    //Customize or override your own directives    	 
    'directives' => [
        'datetime'   => function($expression) {
            return "<?php echo $expression->format('m/d/Y H:i'); ?>";
        },
    ],

    //Exclude directives 
    'exclude' => []
];