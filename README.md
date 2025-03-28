# RedisCache

This is a proof of concept project which checks that the credentials given on a  simple webpage are valid 
and have not been overused in the last 10 minutes using a Redis Cache.

## Used tools
* Python 3.11
* Redis 7.0.15
* PHP 8.2.28

## Instructions

### To run:
1. Download the project
2. In the project folder terminal run ```php -S localhost:8000``` in order to run **login.php** in **localhost port 8000**

1. Run ```redis-server``` to run redis server on **localhost port 6379** 
(for now this is hardcoded, but of course it can be changed on the code)

3. Open the site http://localhost:8000/login.php in a web browser

### To use:

1. Fill the fields. For now the possible correct credentials are 
    1. Name _user1_ and password _password1_ 
    1. Name _user2_ and password _password2_
2. Click on Submit Query. Depending on whether the credentials are valid and the number of connections in the last 10 minutes, a message is shown.

## How it works:
* Upon clicking the button Submit Query in the site, the inputs are filtered and given to the python script **authentication.py**

* This python script, compares the entered credentials are included in the hardcoded credentials:
  * if they are, it checks the number of connections of the given user in the last 10 minutes:
    * if the number is less than 10, this number is updated and a successful login message is shown,
    * else, a failed login due too many connections message is shown.
  * else, a failed login due to invalid credentials message is shown.
