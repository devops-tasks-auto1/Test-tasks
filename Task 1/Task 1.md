**1. The / filesystem is almost full and there are two situations wasting space. We are expecting to see about only 23% use after fixing both of them.**

Somebody deleted apache2 log file /var/log/apache2/other_vhosts_access.log. Copied the file to /dev/null & restarted apache2 with cmd:
cp /dev/null /var/log/apache2/other_vhosts_access.log
sudo systemctl restart rsyslog
sudo systemctl restart apache
After that step 63% of / was free. Another issue was big, 2.8 Gb MySQL garbage file in /var/lib/mysql/garabage/garbage.file. It was removed after task №8. After completing the task total used disk space is about 2.5 Gb.
There is also a problem with /bin/chown permissions, corrected it via mc. And apparmor with firewall services are stopped. Didn't investigate into that because of lack of the task. 
