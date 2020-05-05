import sys
import os
import paramiko


paramiko.util.log_to_file("ssh_conn.log")
host='192.168.23.1'
user='admin'
passw='admin'
output=""
com='show running-config'
ssh_client = paramiko.SSHClient()
print ('client created')
ssh_client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
print ('key policy set')
#ssh_client.connect(hostname='192.168.23.1', port=22,username='admin', password='admin')
ssh_client.connect(hostname=host, port=22, username=user, password=passw, look_for_keys=False, allow_agent=False, timeout=5)
print ('client connected')
(stdin, stdout, stder) = ssh_client.exec_command('show ip int br')
print ('command sent')
data = stdout.readlines()
print ('data read')
stdout.close()
ssh_client.close()
print ('session closed')
print (data)
