#! /usr/bin/env python

from netmiko import ConnectHandler
from getpass import getpass

myrouter = {
    'device_type': 'cisco_ios',
    'host': '192.168.254.150',
    'username': 'cisco',
    'password': getpass(),
}

connection = ConnectHandler(**myrouter)

# using .enable() to enter enable mode
connection.enable()

result = connection.find_prompt()
print(result)

connection.disconnect()
