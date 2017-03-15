<?php
define('ASSETS_FOLDER', get_stylesheet_directory_uri() . '/assets');

function assets($filename = null)
{
    if (preg_match('/^dist\//', $filename)) {
        $manifest = json_decode(file_get_contents(__DIR__ . '/mix-manifest.json'), true);
        $filename = $manifest['/'.$filename];
        return get_stylesheet_directory_uri() . $filename;
    }

    $filename = $filename ? "/{$filename}" : "";
    return ASSETS_FOLDER . $filename;
}
