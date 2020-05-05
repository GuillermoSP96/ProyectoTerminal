import paramiko
ssh = paramiko.SSHClient()
ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())
#host = input("Enter host IP address: ")
#user = input("Enter SSH Username: ")
#passw = input("Enter SSH Password: ")
host='192.168.23.1'
user='admin'
passw='admin'
output=""
com='show running-config'
ssh.connect(hostname=host, port=22, username=user, password=passw, look_for_keys=False, allow_agent=False, timeout=5)
#stdin,stdout,stderr = ssh.exec_command('show users')
stdin, stdout, stderr = ssh.exec_command(com)
print ("ssh succuessful. Closing connection")
stdout=stdout.readlines()
ssh.close()
print ("Connection closed")
#output = stdout.readlines()
#print ('\n'.join(output))
print (stdout)
print (com)
for line in stdout:
    output=output+line
if output!="":
    print (output)
else:
    print ("There was no output for this command")
