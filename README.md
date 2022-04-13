# Automated-Meeting-Planning-
Simplified automated meeting planning using Laravel.

---DESCRIPTION---

This is a simple automated meeting generator, using 3 tables, with the only many-to-many being between employees.id and shift.employee_id.

![alt text](https://github.com/RHenryy/Automated-Meeting-Planning-/blob/main/db_schema.PNG?raw=true)

The shifts are simply divided by half-days, to which are assigned the tinyInts. 
