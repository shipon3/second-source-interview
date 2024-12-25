php v 8.2
laravel v : 11

1. git clone 
	https link : https://github.com/shipon3/second-source-interview.git
	ssh link : git@github.com:shipon3/second-source-interview.git
2. copy example.env and past and rename .env
3. create database and connect 
4. run composer install
5. run php artisan migrate
6. run php artisan serve

post api end point 
1. post create api end point (Method POST) 
		- base_url/api/posts
		- input field like title, content
2. get post api end point (Method GET)
		- base_url/api/posts
3. view single post api end point (Method GET)
		- base_url/api/posts/1	

register api end point 
1. user register api end point (Method POST) 
		- base_url/api/register
		- input field like name, email, password

task api end point 
1. task create api end point (Method POST) 
		- base_url/api/tasks
		- input field like title
2. get task api end point (Method GET)
		- base_url/api/tasks
3. view single task api end point (Method GET)
		- base_url/api/tasks/1	
4. complete task api end point (Method PATCH)
		- base_url/api/tasks/1/complete
5. incomplete task api end point (Method PATCH)
		- base_url/api/tasks/1/incomplete
6. get all incomplete api end point (Method GET)
		- base_url/api/incompleted/tasks