#! /usr/bin/env python3.6

#   para ejecutar desde terminal
#   python3.6 conexionNetmiko.py "sh ip int br"

import sys
import os
from netmiko import ConnectHandler

cisco = {
    'device_type': 'cisco_ios',
    'host':   '192.168.23.1',
    'username': 'cisco',
    'password': 'cisco',
    'port' : 22,          # optional, defaults to 22
    'secret': 'secret',     # optional, defaults to ''
}
net_connect = ConnectHandler(**cisco)
def main(com):
    output = net_connect.send_command(com)
    print(output)

if __name__=="__main__":
    main(sys.argv[1])
