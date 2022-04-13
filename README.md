# Automated-Meeting-Planner
Simplified automated meeting planner using Laravel.


---Description of how the project went---

I had trouble designing a good database pattern, and I think the one I used is still not good. I feel like the "events" table should be linked to the other two in some way. 
I started with the intention of using FullCalendar and do something dynamic, but I was overwhelmed by the complexity of the project considering my current skills.

I decided to still do something that would *work*, though I simplified it a ton and had to remove the dynamic dimension of it. 


---Description---

This is a simple automated nondynamic meeting generator, using 3 tables, with the only many-to-many being between employees.id and shift.employee_id.

![alt text](https://github.com/RHenryy/Automated-Meeting-Planning-/blob/main/db_schema.PNG?raw=true)

The shifts are simply divided by half-days, to which are assigned the tinyInts. 


---Explanation of the functionalities---

On the homepage, you will be able to add an employee to the database. However, you will have to manually link and fill the shift table for that employee.

When you click on "Créer une réunion", the list of employees in the database will be retrieved and be put in a multiple select. You can then choose the employees you want to invite to the meeting, and their ids will be submitted through post. 

Then, the queries will compare column by column in the shift table what is the first possible available time frame selected employees have in common (by doing a SUM of each column). If for example one or more employees do not have any available time frame, it will return an error message and you will be ask to select employees again.

However, upon completion, when a time frame is found, you will be asked to enter a name for the meeting. The employee's names and the "date" of the meeting are sent from the retrieved variables through hidden input fields. The "create reunion" button will then add the data to the "events" table and redirect you to the "events" page where you will be able to see the retrieved data from the table "events". Upon clicking on a table row, you will be able to delete that event from the database. 



---Issues with the project---

There are a few issues with this project: 

 - Biggest one is that it is not dynamic.
 - No precise time frame, only half days.
 - Entering shifts manually as 0 or 1 for each employee seems tedious. Could add select options when creating employees but does not seem very good either.
 - The queries used to filter through the available half-days of each employee are *not* automated. 10 imbricated ifs statements are used, and this is obviously not the    correct way to do it (see: ShiftsController.php).













