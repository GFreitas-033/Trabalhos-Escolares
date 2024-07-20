@echo off

rem O comando color serve para alterar as cores do prompt de comando

color 0c

rem O comando date mostra a date e o comando time mostra a hora

echo ...............................................
echo Date e Hora
date /t
time /t

rem Echo serve como saida de dados mostrando na tela uma mensagem

echo ...............................................
echo Apps
echo.
echo 1 Chrome       
echo 2 Paint
echo 3 Bloco de notas
echo 4 FireFox
echo 5 Calculadora
echo 6 Internet Explorer
echo 7 WinRAR
echo ...............................................
echo Comandos extras
echo.
echo 8 Sair
echo 9 Desligar o PC
echo 10 Cancelar Desligamento
echo ...............................................

rem O comando abaixo serve como entrada de dados e a informacao vai ficar armazenada na variavel 
rem decisao e sera mostrado na tela a mensagem "Escolha uma opcao: (Digite um numeros)"

set /p decisao=Escolha uma opcao: (Digite um numeros)

rem Estrutura de decisao para verificar qual numero foi digitado

rem O comando goto serve para ir para alguma linha de comando tipo "goto c" ele vai buscar pelo
rem ":c" e vai ler o codigo dentro dele
  

	if %decisao%==1 goto c

	if %decisao%==2 goto p

	if %decisao%==3 goto b

	if %decisao%==4 goto f 

	if %decisao%==5 goto ca

	if %decisao%==6 goto i

	if %decisao%==7 goto w

	if %decisao%==8 goto s

	if %decisao%==9 goto d

	if %decisao%==10 goto cd
	
rem O comando start serve para inicializar algum app ou arquivo
rem E o comando exit serve para fechar o prompt de comando 

			
:c
start chrome.exe
start listaapp.bat
exit

:p
start mspaint.exe
start listaapp.bat
exit

:b
start notepad.exe
start listaapp.bat
exit

:f
start firefox.exe
start listaapp.bat
exit

:ca
start calc.exe
start listaapp.bat
exit

:i
start iexplore.exe
start listaapp.bat
exit

:w
start WinRAR.exe
start listaapp.bat
exit

:s
exit

rem O comando shutdown -s -t serve para programar um desligamento automatico da maquina 
rem mas tem como cancelar o desligamento com shutdown -a

:d
shutdown -s -t300 
start listaapp.bat
exit

:cd
shutdown -a
start listaapp.bat
exit

