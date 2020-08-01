#! /usr/bin/env python3.6
import string
import sys
from netmiko import ConnectHandler
#python3.6 -m pip install netmiko
cisco = {
    'device_type': 'cisco_ios',
    'host': '192.168.23.1',
    'username': 'cisco',
    'password': 'cisco',
    'port': 22,  # optional, defaults to 22
    'secret': 'cisco'  # optional, defaults to ''
}
#connection = ConnectHandler(**cisco)
#connection.enable()

#output = connection.find_prompt()
def ejecucion():
    com = sys.argv[1]
    modo=sys.argv[2]
    #config_commands = ['int f0/1','int f1/0']
    #with ConnectHandler(** cisco) as net_connect:
    net_connect = ConnectHandler(**cisco)
    net_connect.enable()
    if modo=="configuracion":
        output = net_connect.send_config_set(com.split("**"))
        print(output)

    else:
        output = net_connect.send_command(com)
        print(output)

#    main()
ejecucion()
