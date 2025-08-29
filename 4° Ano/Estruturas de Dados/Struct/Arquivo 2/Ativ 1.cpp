#include <stdio.h>
#include <stdlib.h>

struct dhm {
   int dia;
   int hora;
   int min;
} data;

main(){
	struct dhm data;
	int minutos;
	
	printf("Digite a quantidade de Minutos:\n");
	scanf("%d", &minutos);

	
	
	printf("%d minutos equivalem a %d dia, %d horas e %d minutos", minutos,data.dia,data.hora,data.min);
}