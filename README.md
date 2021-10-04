## Monitor Urls - DDD

### Raport
Empty

### Task description

Your goal is to create a Laravel microservice that will provide a REST API used for communication with other services.
The microservice should monitor web pages according to the specification included below.

### Criteria

- Build a mechanism that is based on Laravel Queues
- Design a database data structure (Eloquent models, migrations)
- Implement necessary functionalities using Services, Domains (DDD), etc.
- Include a config file for a Supervisor that will run queue workers

### Specification

The app should gather information about every added url every minute.
Information that needs to be gathered for each url:

- Redirection time (sum of all redirections’ time)
- Number of redirections

The specification does not provide time-series data format. It’s your role to design a time-series data format and database structure that will store it.

Required API endpoints:
- POST /monitors - adds a list of urls for monitoring. 
Optional stats parameter will inform an endpoint to gather initial information for as many urls as it can during current execution, at the same time respecting the time limit of 2s. The data collected during this time should be returned in the X-Stats header. Statistics for urls that could not be checked during this time should be set to null. 
There could be multiple urls sent in one request (tens of urls).
- GET /monitors/{url} - returns a list of stats from the last 10 minutes for requested url.

API specification can be found at this address https://drive.google.com/file/d/1cceiZaKW80n4pZbEMdU3XZmKfuCGlc2j/view.

There are 4 available Laravel queues workers.
30 seconds or more of waiting time for a url means that the website is unavailable.

### Tests
Url addresses for testing:
- https://onet.pl/
- http://socialmention.com/
- http://test-redirects.137.software
- https://google.com


### Notes
We will rate your solution based on task completion, efficiency, programming style (Laravel patterns) and general code tidiness and elegance.