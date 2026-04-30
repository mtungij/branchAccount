<?php

if (!function_exists('load_env')) {
    function load_env($path = FCPATH . '.env') {
        if (!file_exists($path)) {
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $line = trim($line);

            // Skip empty lines or full-line comments
            if ($line === '' || strpos($line, '#') === 0) {
                continue;
            }

            // Only process lines with an '=' sign
            $parts = explode('=', $line, 2);
            if (count($parts) !== 2) {
                continue; // Skip lines that are not key=value pairs
            }

            list($name, $value) = array_map('trim', $parts);

            // Remove optional surrounding quotes from value
            $value = trim($value, "\"'");

            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv("$name=$value");
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}
