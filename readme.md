# <p align="center">Soccer team project</p>



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
URL: http://yourdomain.com/api/teams
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
URL: http://yourdomain.com/api/teams/1
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
URL: http://yourdomain.com/api/teams/11
Accept: application/json
Content-Type: application/json
Authorization: Bearer 
Cache-Control: no-cache
Postman-Token: ea98dee7-fb49-2d7f-0923-b6691d842de4
```
* **Team List without login**
```
GET /api/teams HTTP/1.1
URL: http://yourdomain.com/api/teams
Accept: application/json
Content-Type: application/json
Cache-Control: no-cache
Postman-Token: 622bde15-48de-1a52-7c05-6aabbfac9f27
```
* **Team Show Without login**
```
GET /api/teams/16 HTTP/1.1
URL: http://yourdomain.com/api/teams/16
Accept: application/json
Content-Type: application/json
Cache-Control: no-cache
Postman-Token: c20246f3-d1e6-2c30-8c51-7ddc06bee1db

```
* **Search Team Using id or name without login**
```
GET /api/teams/search HTTP/1.1
URL: http://yourdomain.com/api/teams/search or http://yourdomain.com/api/teams/search?id=1 or http://yourdomain.com/api/teams/search?name=xyz
Accept: application/json
Content-Type: application/json
Cache-Control: no-cache
Postman-Token: 42a41606-bd19-8eac-0fae-5039dd179a2b

```
* **Player List Without Login**
```
GET /api/players HTTP/1.1
URL: http://yourdomain.com/api/players
Accept: application/json
Content-Type: application/json
Cache-Control: no-cache
Postman-Token: 1603c2bd-9dbd-9372-ca9b-3ebe502e6a04

```
* **Add Player**
```
POST /api/players HTTP/1.1
URL: http://yourdomain.com/api/players
Accept: application/json
Content-Type: application/json
Authorization: Bearer your authrization token(access token)
Cache-Control: no-cache
Postman-Token: 2438600f-8e39-bfd7-d1c8-921c372f68e7

{
	"team_id":1,
	"first_name":"daulat",
	"last_name":"wadhwani",
	"player_image_uri":"uri"
}
```
* **Update Player**
```
PUT /api/players/8 HTTP/1.1
URL: http://yourdomain.com/api/players/8
Accept: application/json
Content-Type: application/json
Authorization: Bearer access token
Cache-Control: no-cache
Postman-Token: e0a8fd02-112c-a0b4-791d-4ec8940776a6

{
	"team_id":15,
	"first_name":"daulat",
	"last_name":"wadhwani",
	"player_image_uri":"uri"
}
```
* **Delete Player**
```
DELETE /api/players/8 HTTP/1.1
Host: http://yourdomain.com/api/players/8
Accept: application/json
Content-Type: application/json
Authorization: Bearer Your access token
Cache-Control: no-cache
Postman-Token: 8798999a-b041-45b0-d0db-c25cd856ce80

```
* **Show Player without login**
```
GET /api/players/5 HTTP/1.1
URL: http://yourdomain.com/api/players/5
Accept: application/json
Content-Type: application/json
Cache-Control: no-cache
Postman-Token: 0bb386c8-4cb5-6ad5-58fe-a74c55bec9c1

```
* **Search Players without login using id or name**
```
GET /api/players/search HTTP/1.1
URL: http://yourdomain.com/api/players/search or http://yourdomain.com/api/players/search?id=1 *  http://yourdomain.com/api/players/search?name=yyy
Accept: application/json
Content-Type: application/json
Cache-Control: no-cache
Postman-Token: 9074611a-3236-79e4-8a70-a554eab2289f

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















