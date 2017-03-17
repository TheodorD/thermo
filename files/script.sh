while true
do

STR=$(sed '2q;d' /sys/bus/w1/devices/28-000007e9cc0c/w1_slave)
STR=${STR: -5}
#STR=${STR / 100}
STR=${STR:0:2}.${STR:2:3}°C

DATE=$(date +'%F %T') 
/usr/bin/mysql --user=sensor sensor << EOF
insert into therm (time,temp) values('$DATE','$STR');
EOF

echo "completed at $DATE";

/bin/sleep 60

done
