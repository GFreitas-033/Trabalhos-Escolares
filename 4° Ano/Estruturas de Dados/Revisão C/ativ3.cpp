#include <stdio.h>

main(){
	int vetor[10];
	float media;
	int menor;
	int maior;
	
	for(int i=0; i<10; i++){
		printf("\nDigite o %d numero: ", i+1);
		scanf("%d", &vetor[i]);
		
		media+=vetor[i];
		if(i==0){
			menor=vetor[i];
			maior=vetor[i];
		}
	}
	for(int i=0; i<10; i++){
		if(vetor[i]<=menor){
			menor=vetor[i];
		}
		if(vetor[i]>=maior){
			maior=vetor[i];
		}	
	}
	
		

	printf("A media e: %g", (media/10));
	printf("\nA menor e: %d", menor);
	printf("\nA maior e: %d", maior);
}