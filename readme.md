## MtotoShuleni Pro

School Management System created By Izweb Technologies

 ```
 Company: Izweb Technologies
 Website: http://izweb.co.tz
 Dar es salaam
 Tanzania
 
 Chief Software Developer
 Joram John Kimata
 Bs In Computer Science
 UDSM
 ```

 ## Usage

```bash
mv .env-example .env

docker-compose up

```

Open another terminal tab and run:

```bash
docker-compose exec app php artisan key:generate

docker-compose exec app php artisan optimize

docker-compose exec app php artisan migrate --seed

```

Visit http://0.0.0.0:8080
 
 
