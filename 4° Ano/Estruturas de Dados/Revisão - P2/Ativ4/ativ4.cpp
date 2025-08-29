#include <stdio.h>

main(){
	FILE *a;
	a = fopen("arquivo.txt","w");
	int vetor1[8], vetor2[8];
	
	if(a==NULL){
		printf("\nImpossivel abrir o arquivo!!!\n");
	}else{
		for(int i=0; i<8; i++){
			printf("Digite o %d numero, Vetor 1:\n", (i+1));
			scanf("%d", &vetor1[i]);
		}
		for(int i=0; i<8; i++){
			printf("Digite o %d numero, Vetor 2:\n", (i+1));
			scanf("%d", &vetor2[i]);
		}
		
		for(int i=0; i<8; i++){
			int multiplicacao = vetor1[i]*vetor2[i];
			
			printf("Multiplicacao do Indice %d: %d X %d = %d\n", (i+1), vetor1[i], vetor2[i], multiplicacao);
			fprintf(a,"Multiplicacao do Indice %d: %d X %d = %d\n", (i+1), vetor1[i], vetor2[i], multiplicacao);
		}
	}
	fclose(a);
}