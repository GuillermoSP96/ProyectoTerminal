#! /usr/bin/env python3.6
import string
import sys
from netmiko import ConnectHandler
#python3.6 -m pip install netmiko
def ejecucion():
    com = sys.argv[1]
    modo=sys.argv[2]
    usuario=str(sys.argv[3])
    contrasenia=str(sys.argv[4])
    ipHost=str(sys.argv[5])
    cisco = {
        'device_type': 'cisco_ios',
        'host': ipHost,
        'username': usuario,
        'password': contrasenia,
        'port': 22,  # optional, defaults to 22
        'secret': contrasenia
    }
    net_connect = ConnectHandler(**cisco)
    net_connect.enable()
    if modo=="configuración":
        output = net_connect.send_config_set(com.split("**"))
        print(output)
    else:
        output = net_connect.send_command(com)
        print(output)

ejecucion()
