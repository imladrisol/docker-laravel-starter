<p>
<b>Starter project from Laravel8 + Docker (php8 + nginx + mysql)</b>

clone project
**********
>docker run --rm -v $(pwd):/app composer install

>sudo chown -R $USER:$USER ~/<project_path>
> 
> cp .env.example .env
*********
change .env:

DB_HOST=exam

DB_PASSWORD=test
**********************

>docker-compose up -d
> 
>docker ps

>docker-compose exec app php artisan key:generate

>docker-compose exec app php artisan config:cache
***********

>docker-compose exec db bash

>mysql -u root -p #### paswd: test

>show databases;

>GRANT ALL ON exam.* TO 'root'@'%' IDENTIFIED BY 'test';

>FLUSH PRIVILEGES;

>exit;

>exit
********


>docker-compose exec app php artisan migrate

>docker-compose exec app php artisan tinker

> npm install && npm run dev

\DB::table('migrations')->get();
</p>
