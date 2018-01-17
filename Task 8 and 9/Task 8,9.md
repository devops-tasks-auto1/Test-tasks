
**8. Configure the MySQL server to use one file per innodb table and apply the changes to the tables in the test_database without restarting the service.**

chown -R mysql:mysql /var/lib/mysql
Used script from https://github.com/uberhacker/shrink-ibdata1
So I knocked off two in one day - task 8 and 9

**9. Ok, after the previous task, you now realize that the ibdata1 file didn't shrink, and you really want it to free up all this wasted space. You're now allowed to do whatever it takes to slim down this greedy file!**

Used script from https://github.com/uberhacker/shrink-ibdata1
