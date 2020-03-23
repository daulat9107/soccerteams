<p align="center">Soccer team project</p>



## Step 1

git clone https://github.com/daulat9107/soccerteams.git

## Step 2
cd soccerteams

## Step 3
**Inside of your project root dir run following commands:**

cp .env.example .env


Inside .env file 
from line 9 to 14 Provide database connection details


DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=soccerteams

DB_USERNAME=homestead

DB_PASSWORD=secret

## Step 4
**Inside of your project root dir run following commands:**

composer install

php artisan migrate

php artisan key:generate 

php artisan db:seed

php artisan tinker

factory(App\User::class,5)->create();

factory(App\Team::class,10)->create();

factory(App\Player::class,10)->create();

factory(App\Player::class,10)->create(['team_id'=>2]);

factory(App\Player::class,10)->create(['team_id'=>3]);

exit

## Step 5
**Inside of your project root dir run following commands:**

php artisan passport:install

**Output of the this command**

Client ID: 1
Client Secret: 9p5hhNpL3sra28PMPcEi0AYns0llpYvuWofm7YSm
Password grant client created successfully.
Client ID: 2
Client Secret: XzE8Zh8PqbgPlbaG4LfhnqDA2njZbmm8kMQOP244

Now use Password grant client

**For login As admin demo username & password** 

{
	"grant_type":"password",
	"client_id":2,
	"client_secret":"XzE8Zh8PqbgPlbaG4LfhnqDA2njZbmm8kMQOP244",
	"username":"admin@soccerteam.com",
	"password":"pass123",
	"scope":"*"
}

## Step 6
**Inside of your project root dir run following commands:**

phpunit or vendor/bin/phpunit

## Step 7

**Open postman or any other api client **


//Login

POST /oauth/token HTTP/1.1
URl: http://soccerteams.test:8000/oauth/token
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
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijc4MTE4MGI4ZDkzOWE2M2I1MzgwODcyN2ZmODJhNWU5ZjEwOTc4MjM0MTcxZDhiMzQxYjA2YTc5NTg0NmQ0NTY4NjEwMTk5ODhkMGEzNzc1In0.eyJhdWQiOiIyIiwianRpIjoiNzgxMTgwYjhkOTM5YTYzYjUzODA4NzI3ZmY4MmE1ZTlmMTA5NzgyMzQxNzFkOGIzNDFiMDZhNzk1ODQ2ZDQ1Njg2MTAxOTk4OGQwYTM3NzUiLCJpYXQiOjE1ODQ3NDA5ODUsIm5iZiI6MTU4NDc0MDk4NSwiZXhwIjoxNjE2Mjc2OTg1LCJzdWIiOiIxIiwic2NvcGVzIjpbIioiXX0.N4XFv1sJZLOJUK12WpP6K_a98-Kl0vCnyIZP6pksTBtct9cz4cEfwARmVeNAod-XdWmYbWBso72KG4Nvk6aqZGm0INfTD7yOUUKhAUQhcqnUGtc-6z7H1_HKYdPrGLj_N7UmiF3fDQNXml0Y3C-MrO1E1jQOzHYMHrjlDrcA7AfnOELUqidnsoYxXNr-M3deE1c1aQMmfWeI6rHClIqUUlZBOrASolf25_7v9W8kBQLBK8sXifdwaqXOvfM4DsiCZDBdycyY3Iv8OqDr09WtZC6FQpDmVL19_dd8K4nWvePJWpkGkmvCuHhzMVgaKmXfRxzBzmOEG3153mqzYz6oBsGq27TRRoU2plVFD1bIv73bYvPtMEk6wEi_OeevIQUGN_HHzdGLWLmD_RvBCVZhCCDtV5hH5uKkxrw8Yi2rVyXcmxLXh62fhyr7t_HFKhiTCWzfBuaQtaluZleimQkH38Fjs9FBgYpWhJH5PIkebYMVkJ0VaZg_5DwBbUSnCir31SBCiH1MrYq2BmIksxXuIW5b3T8PdPH-xTx1qMLRf8OafoL8e_WxOzsIa2FYWODVqTGOzLoWVvpQl5J1WAMrCNRn0SppRMmned2MaVer7tPai95PK0q0TPFeFwU0Na8ylRRfx2hQwtk61aT11_xNO3t4cxqRZqM9qdGzatGCDBU",
    "refresh_token": "def502007a573c968b73bb5439741aaa06933d2201f46f3aef13fb4efa6e821e252073cfc3094be0ea4f9053b7de5b1fccfd7e54a9f9d3e86194ff63ebb46ba38a3053ac3e869b82ef7bd0c4dabeeab602fcbdd02a587a05a5f062314900ef7353411435fb54a0dcb728fa5b9d4db5213b8a5c8130c77685fb8669ac53bb86331241d46b68da2111fe12118b7312a3ab37fa51e7bd44fff22d32233d73bb16fefce6b98532af70accf0adc2cb5ac805a94a96578f4f491b7670e47e97b83ad21ba3d85dcbafd9715af6cc07794fb628829e5fa6c3c9e23f916c3724bde8fa456eaf3628f2ad76078aaf5e6dbb63e30394c8a70ea0226f4c073921ddbdee4f2347dbf6ad8fc085c8672058bf73db759ac027b8c77a57f8f1a8c0d68fe7fb1a845448ad97c3668546502bd808a7a4d7cccf174909f3632e0c585a83160c08a90e3675df8cfa6afe5895dfa57b6b044dbb5555793f1bd00861570f18ff5d17c1591b3b0c711"
}
//Register

POST /api/register HTTP/1.1
URL: http://soccerteams.test:8000/api/register
Accept: application/json
Content-Type: application/json
Cache-Control: no-cache
Postman-Token: 1f606a38-6998-fbf2-c987-2966100fa305

{
	"name":"daulat",
	"email":"daulat@gmail.com",
	"password":"pass123"
} 


## Step 8
**You can find all routes in**

app/routes/api.php

## Step 9
**You can find all Controllers in**
app/Http/Controllers/RegisterController.php
app/Http/Controllers/TeamController.php
app/Http/Controllers/PlayerController.php

## Step 10
**You can find all Validation classes in**

app/Http/Requests/StorePlayerRequest.php
app/Http/Requests/StoreTeamRequest.php
app/Http/Requests/StoreUserRequest.php

**You can find all Api Resources classes in**

app/Http/Resources/PlayerCollection.php
app/Http/Resources/PlayerResource.php
app/Http/Resources/TeamCollection.php
app/Http/Resources/TeamResource.php
app/Http/Resources/UserResource.php

**You can find Permission trait for user in**

app/Permissions/HasPermissionsTrait.php

**You can find Provider for permission in**

app/Providers/PermissionServiceProvider.php

**You can find Provider for Passports routes registration in boot method in**

app/Providers/AuthServiceProvider.php


**You can find passport driver registration in**

app/config/auth.php


**You can find PermissionServiceProvider and Laravel Passport registration in**

app/config/app.php

Laravel\Passport\PassportServiceProvider::class,

App\Providers\PermissionServiceProvider::class,

**You can find all models in**
app/User.php
app/Role.php
app/Team.php
app/Player.php
app/Permission.php

**Relationship between models**

User and Role (Many to Many)
User and Permission (Many to Many)
Role and Permission (Many to Many)
User and Team (one to Many)
Team and Player (one to Many)













