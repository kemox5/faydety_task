<p align="center">
<img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400">
</p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


<p align="center">
<img src="http://www.faydety.com/img/logo.png" alt="">
</p>

## Faydety Task

<h3>Task 1</h3>
<p>An end-point to store user data</p>

<a href="http://karim-work.dtagdev.com/faydety/api/user/register">http://karim-work.dtagdev.com/faydety/api/user/register</a>

<pre>
{
    "first_name": "Karim",
    "last_name": "Taha",
    "country_code": "EG",
    "phone_number": "01119494098",
    "gender": "male",
    "birthdate": "2019-05-12",
    "avatar": {},
    "email": "ssss0@gmail.com"
}
</pre> 

<hr>

<h3>Task 2</h3>
<p>Create a new end-point to accept password and phone number and
   return unique auth-token along with the response upon success.</p>

<a href="http://karim-work.dtagdev.com/faydety/api/user/encode">http://karim-work.dtagdev.com/faydety/api/user/encode</a>

<pre>
{
    "password": "password",
    "phone_number": "01119494098"
}
</pre>

<hr>

<h3>Task 3</h3>
<p>
Based on Task1 and 2, Develop an end-point that accepts following fields in POST request:

1) phone_number *
2) auth-token *
3) status *
</p>

<a href="http://karim-work.dtagdev.com/faydety/api/user/decode">http://karim-work.dtagdev.com/faydety/api/user/decode</a>

<pre>
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwYXNzd29yZCI6InBhc3N3b3JkIiwicGhvbmVfbnVtYmVyIjoiMDExMTk0OTQwOTgifQ.PQB1w5YvlQ73vYo4se96CVcyDB4q_I7Okl0dsZQUvvI",
}
</pre>
