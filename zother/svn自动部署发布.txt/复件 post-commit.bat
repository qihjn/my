@echo off
SET REPOS=%1
SET USER=%2
SET SVNS="C:/Program Files/VisualSVN Server/bin/svn.exe"
SET DIR="F:/svnwebserver"
SET URLS="http://gy-caojunfei.SNDA.ROOT.CORP:81/svn/2144/"

#%SVNS% checkout %URLS% %DIRS%
(call %SVN% update %DIR% --username admin --password admin --non-interactive)