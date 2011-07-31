<?php
    /**
    * Elgg studio inititialisation function.
    * 
    */
    function snowflakes_init() {
        global $CONFIG;

        
        //elgg_extend_view('page_elements/header', 'snowflakes/canvas');
        elgg_extend_view('css', 'snowflakes/css');
        elgg_extend_view('js/initialise_elgg', 'snowflakes/js');

    }

    
    register_elgg_event_handler('init','system','snowflakes_init');
