<?php
namespace Deployer;

date_default_timezone_set('Europe/Stockholm');

include_once 'vendor/ekandreas/valet-deploy/recipe.php';

set('ssh_type', 'native');
set('ssh_multiplexing', true);

set('domain','elseif3.app');

server( 'production', '178.62.249.226', 22 )
    ->set('deploy_path','/home/forge/www3.elseif.se')
    ->user( 'forge' )
    ->set('branch', 'develop')
    ->set('database','aekab')
    ->set('domain','www3.elseif.se')
    ->stage('production')
    ->identityFile();

set('repository', 'git@github.com:ekandreas/elseif3.git');

// Symlink the .env file for Bedrock
set('env', 'prod');
set('keep_releases', 10);
set('shared_dirs', ['web/app/uploads']);
set('shared_files', ['.env', 'web/.htaccess', 'web/robots.txt']);
set('env_vars', '/usr/bin/env');
//set('writable_dirs', ['web/app/uploads']);

task('deploy:restart', function () {
    writeln('Purge cache...');
    run( 'rm -Rf /home/forge/www3.elseif.se/shared/web/app/uploads/.cache && mkdir -p /home/forge/www3.elseif.se/shared/web/app/uploads/.cache' );
})->desc('Restarting apache2 and varnish');

task( 'deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:shared',
    'deploy:writable',
    'deploy:symlink',
    'cleanup',
    'deploy:restart',
    'success'
] )->desc( 'Deploy your Bedrock project, eg dep deploy production' );

