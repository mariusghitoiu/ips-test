# ips-test
Senior Backend Developer Test for iPhone Photography School

## Plan to approach the exercise
* identify all entities and create/update tables to have all the data connected as need it. 
* create modules for all tables 
* populate database tables with tags content and also generate some fake data for `users` and `user_progress`
* create the API with dummy data and test the update in Infusionsoft for a user. 
* create the tests for new created endpoint.
* decide how we will know what tag to set based on user progress. 
There should be a correlation between how we store progress, modules names/ids and tag names. 
* create the logic to determine the correct tag for an user based on progress. 
* set the tag.

## Logic to determine the next tag: 
- if no module is completed, set the first module tag from the first course bought.
- get last completed modules from each course bought by user and for each determine if it is the last module or not.
    - if all completed are the last one then set "Module reminders completed" tag. 
    - otherwise, set the next module corresponding tag.    
 

# to be deleted - notes from specs to easily follow them
In case of multiple courses attach first uncompleted based on the order they were bought. 
So, the logic is to attache next uncompleted module from the older course bought. 
To attache "Module reminders completed" we need to have all last modules from each course completed.

