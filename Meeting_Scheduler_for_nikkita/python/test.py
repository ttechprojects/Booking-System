#!C:\Python34\python.exe
import os
import mysql.connector
import webbrowser
import sys
f=open("test.html","w")
content="""
<html>
<head>
</head>
<body>
Test
"""
content_end="""
</body>
</html>
"""
#print (sys.argv[1])
f.write(content+sys.argv[0]+content_end)
f.close()
webbrowser.open_new_tab('test.html')
