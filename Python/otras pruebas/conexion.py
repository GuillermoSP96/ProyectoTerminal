#! /usr/bin/env python
# para ejecutar es
# python conexion.py 'sh ip int br'
import sys
import os
import paramiko
def main(com):
    paramiko.util.log_to_file("ssh_conn.log")
    host = '192.168.23.1'
    user = 'admin'
    passw = 'admin'
    output = ""
    #com = 'show ip int br'
    ssh_client = paramiko.SSHClient()
    #print('client created')
    ssh_client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    #print('key policy set')
    ssh_client.connect(hostname=host, port=22, username=user,password=passw, look_for_keys=False, allow_agent=False, timeout=5)
    #print('client connected')
    channel = ssh_client.get_transport().open_session()
    channel.get_pty()
    channel.settimeout(5)
    channel.exec_command(com)
    output = channel.recv(1024)
    print(output)
if __name__=="__main__":
    main(sys.argv[1])
    #main()
"""
def main():
    paramiko.util.log_to_file("ssh_conn.log")
    host = '192.168.23.1'
    user = 'admin'
    passw = 'admin'
    output = ""
    com = 'show ip int br'
    ssh_client = paramiko.SSHClient()
    print('client created')
    ssh_client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    print('key policy set')
    ssh_client.connect(hostname=host, port=22, username=user,password=passw, look_for_keys=False, allow_agent=False, timeout=5)
    print('client connected')
    channel = ssh_client.get_transport().open_session()
    channel.get_pty()
    channel.settimeout(5)
    channel.exec_command(com)
    output = channel.recv(1024)
    print(output)
"""
