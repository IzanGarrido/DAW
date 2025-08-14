@echo off
cls
if NOT EXIST alumnos.csv (
echo Nombre,Apellido,NIA >> alumnos.csv
)
:bucle
echo Dime el nombre
set /p nombre=
echo Dime el apellido
set /p apell=
echo Dime el NIA
set /p nia=
cls
echo.
echo %nombre%,%apell%,%nia%>> alumnos.csv
echo.
echo ¿Quieres continuar? (s/n)
set /p Cont=
if /i %Cont%==s goto bucle
type alumnos.csv