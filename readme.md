<p align="center">Soccer team project</p>



## Step 1
```
git clone https://github.com/daulat9107/soccerteams.git
```

## Step 2
```
cd soccerteams
```

## Step 3
**Inside of your project root dir run following commands:**
```
cp .env.example .env
```

**Inside your .env file set**

```
APP_ENV=production

APP_DEBUG=false


#From line 9 to 14 Provide database connection details


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=soccerteams (set your db name)
DB_USERNAME=homestead (set your db usename)
DB_PASSWORD=secret (set your db password)
```

## Step 4
**Inside of your project root dir run following commands:**
```
composer install

php artisan migrate

php artisan key:generate 

php artisan db:seed

php artisan tinker
# inside tinker run

factory(App\User::class,5)->create();

factory(App\Team::class,10)->create();

factory(App\Player::class,10)->create();

factory(App\Player::class,10)->create(['team_id'=>2]);

factory(App\Player::class,10)->create(['team_id'=>3]);

# exit from tinker

exit
```

## Step 5
**Inside of your project root dir run following commands:**
```
php artisan passport:install
```

**Output of the this command**

```
Client ID: 1
Client Secret: 9p5hhNpL3sra28PMPcEi0AYns0llpYvuWofm7YSm
Password grant client created successfully.
Client ID: 2
Client Secret: XzE8Zh8PqbgPlbaG4LfhnqDA2njZbmm8kMQOP244
```

**Now use Password grant client**

**For login As admin demo username & password** 
```json
{
	"grant_type":"password",
	"client_id":2,
	"client_secret":"XzE8Zh8PqbgPlbaG4LfhnqDA2njZbmm8kMQOP244",
	"username":"admin@soccerteam.com",
	"password":"pass123",
	"scope":"*"
}
```

## Step 6
**Inside of your project root dir run following commands:**
```
phpunit or vendor/bin/phpunit
```

## Step 7

**Open postman or any other api client**


* **Login**

```json
POST /oauth/token HTTP/1.1
URl: http://yourdomain.com/oauth/token
Accept: application/json
Content-Type: application/json
Cache-Control: no-cache
Postman-Token: f873e7f3-8776-2cbc-820f-3b21dcdce68c

{
	"grant_type":"password",
	"client_id":2,
	"client_secret":"XzE8Zh8PqbgPlbaG4LfhnqDA2njZbmm8kMQOP244",
	"username":"admin@soccerteam.com",
	"password":"pass123",
	"scope":"*"
}
Response
{
    "token_type": "Bearer",
    "expires_in": 31536000,
    "access_token": "Your api access token (that you will get after login)",
    "refresh_token": "Your refresh token"
}
```
* **Register**
```
POST /api/register HTTP/1.1
URL: http://yourdomain.com/api/register
Accept: application/json
Content-Type: application/json
Cache-Control: no-cache
Postman-Token: 1f606a38-6998-fbf2-c987-2966100fa305

{
	"name":"daulat",
	"email":"daulat@gmail.com",
	"password":"pass123"
} 
```
* **Team Add**
```
POST /api/teams HTTP/1.1
URL: http://soccerteams.test:8000/api/teams
Accept: application/json
Content-Type: application/json
Authorization: Bearer your authrization token(access token)
Cache-Control: no-cache
Postman-Token: 01d505b0-d621-add2-c14a-e3d0f897b5c4

{
	"name":"xyz",
	"logo_uri":"uri"
}
```
* **Team Update**
```
PUT /api/teams/1 HTTP/1.1
URL: http://soccerteams.test:8000/api/teams/1
Accept: application/json
Content-Type: application/json
Authorization: Bearer your authrization token(access token)
Cache-Control: no-cache
Postman-Token: 49fa2e77-b54a-e847-d610-7f41bac78e89

{
	"name":"ppp",
	"logo_uri":"uri"
}
```
* **Team Delete**
```
DELETE /api/teams/11 HTTP/1.1
URL: http://soccerteams.test:8000/api/teams/11
Accept: application/json
Content-Type: application/json
Authorization: Bearer 
Cache-Control: no-cache
Postman-Token: ea98dee7-fb49-2d7f-0923-b6691d842de4
```
* **Team List without login**
```
GET /api/teams HTTP/1.1
URL: http://soccerteams.test:8000/api/teams
Accept: application/json
Content-Type: application/json
Cache-Control: no-cache
Postman-Token: 622bde15-48de-1a52-7c05-6aabbfac9f27

```
## Step 8
**You can find all routes in**

* app/routes/api.php

## Step 9
**You can find all Controllers in**

* app/Http/Controllers/RegisterController.php
* app/Http/Controllers/TeamController.php
* app/Http/Controllers/PlayerController.php

**You can find all Validation classes in**

* app/Http/Requests/StorePlayerRequest.php
* app/Http/Requests/StoreTeamRequest.php
* app/Http/Requests/StoreUserRequest.php

**You can find all Api Resources classes in**

* app/Http/Resources/PlayerCollection.php
* app/Http/Resources/PlayerResource.php
* app/Http/Resources/TeamCollection.php
* app/Http/Resources/TeamResource.php
* app/Http/Resources/UserResource.php

**You can find Permission trait for user in**

* app/Permissions/HasPermissionsTrait.php

**You can find Provider for permission in**

* app/Providers/PermissionServiceProvider.php

**You can find Provider for Passports routes registration in boot method in**

* app/Providers/AuthServiceProvider.php


**You can find passport driver registration in**

* app/config/auth.php


**You can find PermissionServiceProvider and Laravel Passport registration in**

* app/config/app.php
```
Laravel\Passport\PassportServiceProvider::class,

App\Providers\PermissionServiceProvider::class,
```

**You can find all models in**

* app/User.php
* app/Role.php
* app/Team.php
* app/Player.php
* app/Permission.php

**Relationship between models**

* User and Role (Many to Many)
* User and Permission (Many to Many)
* Role and Permission (Many to Many)
* User and Team (one to Many)
* Team and Player (one to Many)

**Database Migrations in**

* app/database/migrations

**Database Seeds in**

* app/database/seeds/DatabaseSeeder.php
* app/database/seeds/PermissionTableSeeder.php
* app/database/seeds/RolePermissionsTableSeeder.php
* app/database/seeds/RoleTableSeeder.php
* app/database/seeds/UserRoleTableSeeder.php
* app/database/seeds/UsersTableSeeder.php

**Database Factories for generating fake data in db**

* app/database/factories/PlayerFactory.php
* app/database/factories/TeamFactory.php
* app/database/factories/UserFactory.php

**Unit testing classes**

* app/tests/TeamModelTest.php
* app/tests/TeamResourceTest.php
* app/tests/UserModelTest.php















