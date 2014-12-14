import subprocess
def runProcess(exe, logfile):    
    p = subprocess.Popen(exe, stdout=subprocess.PIPE, stderr=subprocess.STDOUT)
    while(True):
      retcode = p.poll() #returns None while subprocess is running
      line = p.stdout.readline()
      f = open(logfile, 'a')
      f.write(line.decode("utf-8"))
      f.close() #print(line)
      if(retcode is not None):
        break

f=open('C:\\wwwroot\\_src\\_logs\\terraria.log','w')
f.write('')
f.close()		
runProcess("start-server.bat", "C:\\wwwroot\\_src\\_logs\\terraria.log")
f=open('C:\\wwwroot\\_src\\_logs\\terraria.log','a')
f.write('done')
f.close()
