#include <stdio.h>
#include <string.h>
#include <stdlib.h>

main(){
	char data[11], subDia[3], subMes[3], subAno[5];
	int dia=0,mes=0,ano=0;
	
	printf("Digite uma Data no padrao XX/XX/XXXX:\n");
	gets(data);
	
	strncpy(subDia, data + 0, 2);
	subDia[2] = '\0';
	dia = atoi(subDia);
	
	strncpy(subMes, data + 3, 2);
	subMes[2] = '\0';
	mes = atoi(subMes);
	
	strncpy(subAno, data + 6, 4);
	subAno[4] = '\0';
	ano = atoi(subAno);
	
    printf("Dia: %d\n", dia);
    printf("Mes: %d\n", mes);
    printf("Ano: %d\n", ano);
}