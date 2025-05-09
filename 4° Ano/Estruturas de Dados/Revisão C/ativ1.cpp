#include <stdio.h>

main(){
	int tamanho;
	
	printf("Qual sera o tamanho do vetor:\n");
	scanf("%d", &tamanho);
	int vetor[tamanho];
	
	for(int i=0; i<tamanho; i++){
		printf("\nDigite o %d numero: ", i+1);
		scanf("%d", &vetor[i]);
	}
	
	for(int i=0; i<tamanho; i++){
		printf("\nO %d numero e: %d", (i+1),vetor[i]);
	}
}