#! /usr/bin/env python
import sys
import os
from netmiko import ConnectHandler
from getpass import getpass


def main(nombre,ip,puerto,usuario,contssh,contenable):
    cisco = {
        'device_type': 'cisco_ios',
        'host': ip,
        'username': usuario,
        'password': contssh,
        'secret': contenable,
        'port': puerto
    }
    print(cisco)
    print("hola")
    #connection = ConnectHandler(**cisco)
    #connection.enable()
    #config_commands = ['sh ip int br']
    #output = connection.send_config_set(com)
    #output = connection.send_command(com)
    #output = connection.find_prompt()
    #print(output)


if __name__ == "__main__":
    main(sys.argv[1],sys.argv[2],sys.argv[3],sys.argv[4],sys.argv[5],sys.argv[6])
    #main()
