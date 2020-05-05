# -*- coding: iso-8859-15
import sys
import os
import paramiko

def otro(cad):
    paramiko.util.log_to_file("ssh_conn.log")
    host = '192.168.23.1'
    user = 'admin'
    passw = 'admin'
    output = ""
    com = 'show ip int br'
    ssh_client = paramiko.SSHClient()
    #print('client created')
    ssh_client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    #print('key policy set')
    #print('client connected')
    ssh_client.connect(hostname=host, port=22, username=user,password=passw, look_for_keys=False, allow_agent=False, timeout=5)
    channel = ssh_client.get_transport().open_session()
    channel.get_pty()
    channel.settimeout(5)
    channel.exec_command(cad)
    output = channel.recv(1024)
    print(output)
if len(sys.argv) >= 2:
    print ("El texto '%s' tiene %s caracteres" % (sys.argv[1],len(sys.argv[1])))  
    otro(sys.argv[1])  
else:
    print ("Necesito un parámetro")


