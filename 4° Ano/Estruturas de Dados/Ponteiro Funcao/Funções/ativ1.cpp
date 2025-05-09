#include <stdio.h>

void ler(int *v){
	for(int i=0; i<5; i++){
		printf("Digite o %d numero:\n", (i+1));
		scanf("%d", &v[i]);
	}
}

void imprimir(int *v){
	for(int i=0; i<5; i++){
		printf("%d  ", v[i]);
	}
}

void inverter(int *v){
	for(int i=4; i>=0; i--){
		printf("%d  ", v[i]);	
	}
}

main(){
	int vetor[5];

	ler(vetor);	
	
	printf("\nVetor Normal:\n");
	imprimir(vetor);
	printf("\nVetor Invertido:\n");
	inverter(vetor);
}