#! /usr/bin/env python
import sys
import os
import json
from netmiko import ConnectHandler
from getpass import getpass


#def main(nombre,ip,puerto,usuario,contssh,contenable):
def main(config):
    sal = json.loads(config)
    cisco = {
        'device_type': 'cisco_ios',
        'host': sal['ip'],
        'username': sal['usuario'],
        'password': sal['passSSH'],
        'secret': sal['passEN'],
        'port': sal['puerto']
    }
    connection = ConnectHandler(**cisco)
    #connection = ConnectHandler(device_type='cisco_ios', host=sal['ip'],username=sal['usuario'], password=sal['passSSH'],secret=sal['passEN'],port=sal['puerto'])
    #connection.enable()
    com = 'sh ip int br'
    #output = connection.send_config_set(com)
    output = connection.send_command(com)
    salida = json.dumps(output)
    #output = connection.find_prompt()
    print(output)

if __name__ == "__main__":
    main(sys.argv[1])
