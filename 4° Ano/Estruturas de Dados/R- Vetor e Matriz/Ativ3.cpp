#include <stdio.h>
#include <ctime>
#include <stdlib.h>

main(){
	int vetor[10], j=9, aux=0;
	srand(time(NULL));
	
	for(int i=0; i<10; i++){
		vetor[i] = rand()%100;
	}
	
	printf("Vetor Original:\n");
	for(int i=0; i<10; i++){
		printf("%d  ", vetor[i]);
	}
	
	for(int i=0; i<5; i++){
		aux = vetor[i];
		vetor[i] = vetor[j];
		vetor[j] = aux;
		
		j--;
	}
	
	printf("\nVetor Baguncado:\n");
	for(int i=0; i<10; i++){
		printf("%d  ", vetor[i]);
	}
}