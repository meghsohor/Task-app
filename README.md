# Task-app
Simple Task list app using Raw PHP and Laravel

## How it Works
1.	First the app checks the server info and connects to database
2.	In the index file all the existing tasks will be listed by fetching data from DB.
3.	If anyone wants to create a task, then they need to click “Create Task” button. It will open a modal and after submitting the data the app will send the data to addTask.php file where data will be verified and inserted to database
4.	Clicking to Edit button the App will take to editTask.php file where existing data from DB will be fetched and prepopulated in the input fields. Updating the data and submitting will be verified in the in the existing page and DB will be updated
5.	Clicking the Delete button will open a confirmation Dialog box. If pressed ok, a JS function will pass the id of the selected Task to deleteTask.php file which will verify data and will delete the selected Task from DB and will return the user to the index page.


## Screenshots




