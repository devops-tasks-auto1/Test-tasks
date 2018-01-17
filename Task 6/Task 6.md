**6. A web showing a couple reports about meaningless car statistics should be available in port 7777, but it's not working. Please investigate and fix every problem you find in all the services it depends on, until it's up & running again.**

First I fixed the redis:

    sudo vi /etc/sysctl.conf
    vm.overcommit_memory=1
    sysctl vm.overcommit_memory=1
    sudo service redis-server stop
Then fixed a typo in:
    /etc/redis/redis.conf, at line 762 >> 'this_is_a_typo'
    appendonly no

    chown redis:redis /var/lib/redis/dump.rdb
    chmod 660 /var/lib/redis/dump.rdb
    sudo service redis-server start

Installed latest php5-dev, nginx, redis libraries, glued php5-fpm with nginx via unix socket(there is a typo in socket name btw), fixed the typos in PHP code, checked the SQL queries. Set te MySQL db root password to toor.
The car statistics app is up and working here:

http://127.0.0.1:7777/test_app/index.php
