#!/bin/bash

cd /var/www/pterodactyl

echo "Your Artisan File has been found!"

echo "Downloading the Theme"
mkdir -p tempdown && cd tempdown && git clone https://github.com/treckk00/pageDesign.git .

cp -r app ..
cp -r config ..
cp -r database ..
cp -r public ..
cp -r resources ..
cp -r routes ..

echo "Files have been copied over!"

echo "Removing the temp folders created in the copy process"

cd .. && rm -rf tempdown
php artisan migrate --path=/database/migrations/2021_05_30_141248_create_unix_settings_table.php

echo "Complete! Have a good day and dont forget to refresh your browser cache! (CTRL + F5)"
