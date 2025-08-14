@echo off

:pregunta 
REM set /p archivo=Ingrese nombre del archivo: 
if "%1" == "" (goto :error) else (goto :contador)

:error 
echo No has introducido ningun parametro
exit /b 1

:contador
set cuenta=0
for /f %%a in (%1) do (
	set /a cuenta=1+cuenta
	REM echo %%a
)
echo Hay %cuenta% lineas