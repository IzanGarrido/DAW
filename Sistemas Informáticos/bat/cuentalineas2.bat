@echo off
cls

title CuentaLineas
set contar=0

for %%x in (%*) do (
	find /c /v "" "%%x"
	set /a contar+=1
)

echo El numero de argumentos es: %contar%