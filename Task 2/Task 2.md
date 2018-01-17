**2. Give the system some swap memory using the ephemeral disk already available in the instance.**

    lsblk -p
    NAME                      MAJ:MIN RM    SIZE RO TYPE MOUNTPOINT
    /dev/xvda                 202:0    0      8G  0 disk
    ├─/dev/xvda1              202:1    0 1007.5K  0 part
    └─/dev/xvda2              202:2    0      8G  0 part /
    /dev/xvdd                 202:48   0      4G  0 disk
    /dev/xvde                 202:64   0      1G  0 disk
    └─/dev/mapper/mysql-mysql 254:0    0   1020M  0 lvm  /var/lib/mysql

    mkdir /tmp/xvdd4G
    Used mc to check is there anything important inside that partition
    mount /dev/xvdd /tmp/xvdd4G/
    mc
    umount /dev/xvdd
    swapon /dev/xvdd
    swapon -s
    Filename                                Type            Size    Used    Priority
    /dev/xvdd                               partition       4188668 17448   -1

    nano /etc/fstab
    /dev/xvdd       none    swap    sw  0       0

    swapon -s
    Filename                                Type            Size    Used    Priority
    /dev/xvdd                               partition       4188668 0       -1
