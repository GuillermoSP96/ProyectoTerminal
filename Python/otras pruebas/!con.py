import paramiko
remote_conn_pre = paramiko.SSHClient()
remote_conn_pre.set_missing_host_key_policy(paramiko.AutoAddPolicy())
remote_conn_pre.connect(hostname='192.168.23.1', port=22, username='admin', password='admin', look_for_keys=False, allow_agent=False, timeout=5)
