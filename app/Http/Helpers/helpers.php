<?php

if (!function_exists('sanitize_input')) {
    function sanitize_input($input)
    {
        if (is_array($input)) {
            array_walk_recursive($input, function (&$value) {
                if (is_string($value)) {
                    $value = strip_tags($value); // Remove HTML tags
                }
            });
        } elseif (is_string($input)) {
            $input = strip_tags($input);
        }

        return $input;
    }
}
