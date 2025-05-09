#include <stdio.h>
#include <ctime>
#include <stdlib.h>

main(){
	int vetor[10];
	int valorI=0, tf=0;
	srand(time(NULL));
	
	for(int i=0; i<10; i++){
		vetor[i] = rand()%21;
	}
	
	printf("Digite um Numero de 1 a 20:\n");
	scanf("%d", &valorI);
	
	for(int i=0; i<10; i++){
		if(valorI==vetor[i]){
			if(tf==0){
				printf("\nVoce Acertou o Numero\n");
			}
			printf("Linha: %d\n", (i+1));
			tf=1;
		}
	}
	if(tf==0){
		printf("\nVoce Errou o Numero\n");
	}
	
	printf("\nVetor:\n");
	for(int i=0; i<10; i++){
		printf("Linha: %d --- Valor: %d\n", (i+1),vetor[i]);
	}
}