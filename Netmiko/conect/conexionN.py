#! /usr/bin/env python
import sys
import os
from netmiko import ConnectHandler
from getpass import getpass

cisco = {
    'device_type': 'cisco_ios',
    'host': '192.168.23.1',
    'username': 'cisco',
    'password': 'cisco',
    'port': 22,  # optional, defaults to 22
    'secret': 'cisco',  # optional, defaults to ''
}
connection = ConnectHandler(**cisco)
connection.enable()
# Alternativamente, podría llamar directamente a la función ConnectHandler
# y no usar un diccionario (como se indica a continuación):
#net_connect2 = ConnectHandler(device_type='cisco_ios', host='cisco.domain.com',username='admin', password='cisco123')


def main(com):
    config_commands = ['sh ip int br']
    #output = connection.send_config_set(com)
    output = connection.send_command(com)
    #output = connection.find_prompt()
    print(output)


if __name__ == "__main__":
    main(sys.argv[1])
    #main()
