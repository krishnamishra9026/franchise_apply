<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';

// Config

set('repository', 'git@gitlab.n2rtechnologies.com:KrishnaMishra/ttrading-plateform.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('38.242.196.238')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/var/www/php81/trading-plateform')
    ->set('keep_releases', 2);


// Hooks

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:migrate',
    //'npm:install',
    'npm:run:build',
    'deploy:publish',
]);

task('npm:run:build', function () {
    cd('{{release_or_current_path}}');
    run('composer install');
    //run('npm run build');
});


after('deploy:failed', 'deploy:unlock');
