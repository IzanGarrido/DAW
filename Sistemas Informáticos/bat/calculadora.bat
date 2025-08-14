@echo off

:inicio
cls
title Calculadora

echo "Elige una de las opciones: "
set /p opcion="1.Sumar , 2.Restar , 3.Multiplicar , 4.Dividir, 5.Salir: "

if %opcion% equ 5 (exit /b 1)


set /p numero1="Numero 1: "
set /p numero2="Numero 2: "

if %opcion% equ 1 (set /a resultado=%numero1% + %numero2%)

if %opcion% equ 2 (set /a resultado=numero1 - numero2)

if %opcion% equ 3 (set /a resultado=numero1 * numero2)

if %opcion% equ 4 (set /a resultado=numero1 / numero2)

echo El resultado es %resultado%

pause 
	
goto inicio