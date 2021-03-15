<?php
    // Init session
    session_start();

    // Flash message helper
     // Example: flash('register_success', 'You are registered.', 'alert alert-danger');
     // Display in view: echo flash('register_success'); 
    function flash($name = '', $message = '', $class = 'alert alert-success'){
        if(!empty($name)){
            // No message is in the session
            if(!empty($message) && empty($_SESSION[$name])){

                if(!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }

                if(!empty($_SESSION[$name . '_class'])) {
                    unset($_SESSION[$name . '_class']);
                }

                $_SESSION[$name] = $message;
                $_SESSION[$name . '_class'] = $class;
            } elseif(empty($message) && !empty($_SESSION[$name])){
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
                // Unset after displaying
                unset($_SESSION[$name]);
                unset($_SESSION[$name . '_class']);
            }
        }
    }