#! /usr/bin/env python
import sys
import os
import paramiko
host = '192.168.23.1'
user = 'cisco'
passw = 'cisco'
output = ""
ssh_client = paramiko.SSHClient()
ssh_client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
ssh_client.connect(hostname=host, port=22, username=user,password=passw, look_for_keys=False, allow_agent=False, timeout=5)
channel = ssh_client.get_transport().open_session()
channel.get_pty()
channel.settimeout(5)
def main(com):
    channel.exec_command(com)
    output = channel.recv(1024)
    print(output)

if __name__=="__main__":
    main(sys.argv[1])
