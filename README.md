## How to get Some data into database

There are some factories for campaigns and inputs. To get some fake data into the database. To get it you need to run the following commands and also make sure you have created a database.

-   php artisan migrate (creates all the database tables)
-   php artisan db:seed (seeds the database tables with fake data)

## Tests

There are some tests for the create campaign, get all campaigns, search user by email and get all users. To run the test use the following command php artisan test.

## Api endpoints

### /api/campaigns

Method: Get<br>
response: data: {<br>
[<br>
{<br>
"id": 410,<br>
"userId": 7,<br>
"inputs": [<br>
{<br>
"id": 208,<br>
"channel": "new test channel 5",<br>
"source": "new test source 5",<br>
"name": "new test campaign 5",<br>
"url": "new test url 5"<br>
}<br>
],<br>
"created_at": "2023-04-10 18:00:08"<br>
},<br>
],<br>
"links": {<br>
"first": "http://localhost:8000/api/campaigns?page=1",<br>
"last": "http://localhost:8000/api/campaigns?page=21",<br>
"prev": null,<br>
"next": "http://localhost:8000/api/campaigns?page=2"<br>
},<br>
"meta": {<br>
"current_page": 1,<br>
"from": 1,<br>
"last_page": 21,<br>
"links": [<br>
{<br>
"url": null,<br>
"label": "&laquo; Previous",<br>
"active": false<br>
},<br>
{<br>
"url": "http://localhost:8000/api/campaigns?page=1",<br>
"label": "1",<br>
"active": true<br>
}<br>
]<br>
}<br>
}<br>
Content-Type: application/json<br>
query param: campaign_order_by=created_at (order by creation date. By default campaign_order_by order by campaign id)<br>
query param: sort_order=desc (order by desc or asc. By default sort_order is set to campaign desc)<br>
query param: page_size=10 (number of campaigns per page. By default page_size is set to 20)<br>

### /api/campaigns

Method: post<br>
body data: {<br>
"channel" : " new test channel 5",<br>
"source" : "new test source 5",<br>
"campaign_name": "new test campaign 5",<br>
"target_url": "new test url 5",<br>
"user_id": 7<br>
} <br>
channel: string required length max 255 <br>
source: string required length max 255 <br>
campaign_name: string required length max 255 <br>
target_url: string required length max 255 <br>
user_id: int required <br>
status: 201 ok on success and 422 on validation error <br>
response: the create campaign on success error message(s) on failure
accept: application/json

### /api/user

Method: get <br>
response: {
users: [<br>
{<br>
"user_id": 1,<br>
"name": "test user 1",<br>
"email": "test@mail1.dk",<br>
"campaigns": 3<br>
}<br>
]<br>
} <br>
query param: ?email=test@mail$10.dk (200 if user is found else 404)<br>
query param: ?name=Test+user10 (200 if user is found else 404)<br>
Content-Type: application/json<br>
