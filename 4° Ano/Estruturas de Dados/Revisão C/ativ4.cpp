#include <stdio.h>

main(){
	int tamanho;
	int menor;
	int maior;
	
	printf("Qual sera o tamanho do vetor:\n");
	scanf("%d", &tamanho);
	int vetor[tamanho];
	
	for(int i=0; i<tamanho; i++){
		printf("\nDigite o %d numero: ", i+1);
		scanf("%d", &vetor[i]);
		if(i==0){
			menor=vetor[i];
			maior=vetor[i];
		}
	}     
	
	for(int i=0; i<tamanho; i++){
		if(vetor[i]<=menor){
			menor=vetor[i];
		}
		if(vetor[i]>=maior){
			maior=vetor[i];
		}	
	}
	
	printf("\nA menor e: %d", menor);
	printf("\nA maior e: %d", maior);             
}