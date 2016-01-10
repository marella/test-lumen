### Overview
Each service shares only the framework code and the `Api` service located in *services/Api/Api.php*. Each service including main app can interact with other services only through `Api` service. `Api` service will use internal routing in monolith. When dividing monolith into microservices only this has to change.

### Initial setup

file or dir|action
---|---
storage/|make it writable by apache
public/index.php|change to `$app->run($app['request'])`
bootstrap/app.php|uncomment `Dotenv::load`
bootstrap/app.php|uncomment `$app->withFacades()`
bootstrap/app.php|move app route group to *app/Http/routes.php*
.env|copy *.env.example* to *.env*
conifg/|copy *vendor/laravel/lumen-framework/config/*
app/Http/routes.php|add `$app->configure('app')`
services/|mkdir *services* and use *app* dir structure for each service and change namespaces, filenames etc.
composer.json|add `"Services\\": "services/"` and run `composer dump-autoload`
bootstrap/app.php|add *services/ServiceName/Http/routes.php*
config/services/|mkdir *services* and add service specific config here
services/ServiceName/Http/routes.php|add `$app->configure('services/service_name')`

### Monolith to Microservices
- Make copies of the framework code and do initial setup for each microservice
- Copy *config/services/service_name.php* and *services/ServiceName/* dir
- Copy other config like *config/database.php* that is used by common services like `DB`, `Cache` etc.
- Keep only current service routes in *bootstrap/app.php*
- Implement `Api` service to make requests to respective endpoints instead of doing internal routing

### Test
```bash
# cd to www root
mkdir test && cd test
git clone https://github.com/marella/test-lumen.git
cd test-lumen/monolith
composer install
# now cd to other dirs (app, service_a, service_b) and run composer install
# or simply copy composer.lock and vendor dir
```
If required change `$base_url` in `services/Api/Api.php` inside *test-lumen/app/*, *test-lumen/service_a/* and *test-lumen/service_b/*. Default `$base_url` is `http://localhost/test/test-lumen/`.

- [Monolith app](http://localhost/test/test-lumen/monolith/public/test)
- [Monolith Service A](http://localhost/test/test-lumen/monolith/public/service/service-a/test)
- [Monolith Service B](http://localhost/test/test-lumen/monolith/public/service/service-b/test)
- [app](http://localhost/test/test-lumen/app/public/test)
- [Microservice A](http://localhost/test/test-lumen/service_a/public/service/service-a/test)
- [Microservice B](http://localhost/test/test-lumen/service_b/public/service/service-b/test)
