#! /usr/bin/env python
import sys
import os
from netmiko import ConnectHandler
output = ""
cisco= {
    'device_type': 'cisco_ios',
    'host':   '192.168.23.1',
    'username': 'admin',
    'password': 'admin',
    'port' : 22,          # optional, defaults to 22
    'secret': 'secret',     # optional, defaults to ''
}
net_connect = ConnectHandler(**cisco)
def otro(com):
    output = net_connect.send_command(com)
    print(output)
    


if __name__=="__main__":
    otro(sys.argv[1])