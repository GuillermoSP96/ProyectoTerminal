#! /usr/bin/env python
import sys
import os
import paramiko
host = '192.168.23.1'
user = 'admin'
passw = 'admin'
output = ""
ssh_client = paramiko.SSHClient()    
ssh_client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
ssh_client.connect(hostname=host, port=22, username=user,password=passw, look_for_keys=False, allow_agent=False, timeout=5)
channel = ssh_client.get_transport().open_session()
channel.get_pty()
channel.settimeout(5)
def otro(com):
    #paramiko.util.log_to_file("ssh_conn.log")
    #com = 'show ip int br'
    #print('client created')
    #print('key policy set')
    #print('client connected')
    channel.exec_command(com)
    output = channel.recv(1024)
    print(output)

if __name__=="__main__":
    #main(sys.argv[1])
    otro(sys.argv[1])