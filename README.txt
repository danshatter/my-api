MY-API

/* This is my fourth personal project. It is a REST API from scratch. Depending on the request method, you can GET, POST, PUT, PATCH, and DELETE resources */

- Import the 'my-api.sql' to get you started. This will create a 'users' table. Make sure you fill in the correct database connection credentials in the 'credentials/secure.php' file. Some dummy data are present in the 'users' table to get you started immediately.

- You could use postman to test it. Depending on the request method, perform the following requests on the endpoints

GET (all records)	SERVER_ROOT/my-api/api/users.php

GET (one record)	SERVER_ROOT/my-api/api/users.php?id={id}

POST			SERVER_ROOT/my-api/api/users.php

PUT/PATCH		SERVER_ROOT/my-api/api/users.php

DELETE			SERVER_ROOT/my-api/api/users.php

- Resources are displayed in JSON format.

- For POST, all fields are required except the 'middle_name' field.

- For PUT, PATCH and DELETE requests, an ID is compulsory.

- A DELETE request only needs an ID to delete a resource.

- PUT and PATCH any changes you may require. 

- This is the naming convention for the keys for the JSON input on POST, PUT, PATCH and DELETE requests

	"id"
	"first_name"
	"middle_name"
	"last_name"
	"date_of_birth"
	"sex"
	"address"
	"email"
	"contact"
