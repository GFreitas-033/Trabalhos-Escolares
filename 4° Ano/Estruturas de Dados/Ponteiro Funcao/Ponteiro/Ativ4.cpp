#include <stdio.h>

main(){
	float vetor[10];
	
	for(int i=0; i<10; i++){
		printf("Endereco da posicao %d: %d\n", (i+1),&vetor[i]);
	}
}