import paramiko

ssh = paramiko.SSHClient()
ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())

host = input("Enter host IP address: ")
user = input("Enter SSH Username: ")
passw = input("Enter SSH Password: ")
port = 22

ssh.connect(host, port, username=user, password=passw, look_for_keys=False,allow_agent=False)
stdin,stdout,stderr = ssh.exec_command('show users')
output = stdout.readlines()
print ('\n'.join(output))
