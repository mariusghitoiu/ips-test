# ips-test
Senior Backend Developer Test for iPhone Photography School

## Plan to approach the exercise
* identify all entities and create/update tables to have all the data connected as need it. 
* populate database tables with tags content and also generate some fake data for `users` and `user_progress`
* create Models for new tables and define relations between them.  
* create the API with dummy data and test the update in Infusionsoft for a user. 
* create the tests for new created endpoint.
* decide how we will know what tag to set based on user progress. 
There should be a correlation between how we store progress, modules names/ids and tag names. 
* create the logic to determine the correct tag for an user based on progress. 
* set the tag.

## Logic to determine the next tag: 
- if no module is completed, set the first module tag from the first course bought.
- get last completed module "order" value for each course bought by user
- get last module "order" value for all courses bought by user
- iterate through all courses bought by users and 
if last module order is < max module order for current course 
return tag associated with first module of current course > last completed module "order" value.  
- if no module is completed it will automatically take the tag for first module from first bought course
- if all last modules from all bought courses are completed it wil return "Module reminders completed" tag.     

## Some comments related to automated tests
* I have written very few automated tests for previous projects I worked on so my experience with testing is limited.
* Now, because of this test for IPS I have started to revisit testing concepts with Laravel and Phpunit, 
but I doesn't seem right to delay the submission of this test untill "I get it enough" to write tests as expected. 

* I wrote only a few, which are pretty straight forward but I will have to spend more time learning until I will write tests I am satisfied with in a production app. 

## Comments in general about the test 
* I have update seeders to create close enough data so that I can test easily various scenarios. There is room for improvement there if necessary. 
* Refactored some things that I considered should be different.
* Ideally to test you have to create and populate the database by running migrations and seeders as once. 
If you already have data in "modules" table you will have to truncate it, otherwise seeder will not run again.    
* Was a fun test overall :) 