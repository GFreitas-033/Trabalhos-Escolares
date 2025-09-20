#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>

void preencher(int num, int *vetor){
	printf("Digite os numeros do vetor:\n");
	for(int i=0; i<num; i++){
		scanf("%d", &vetor[i]);
	}
}

main(){
	int *v;
	int laco=1, cont=0, resize=10;
	
	v = (int *) calloc(resize, sizeof(int));
	
	if(v == NULL){
		printf("\nErro para alocacao de memoria\n");
	}else{
		printf("Informe o Numero: (0-Encerra)\n");
		while(laco!=0){
			if(cont>=resize){
				resize += 10;
				v = (int *) (realloc(v, (resize) * sizeof(int)));
			}
			
			scanf("%d", &v[cont]);
	
			if(v[cont] == 0){
				laco = 0;
			}else{
				cont++;	
			}
		}
	}
	
	printf("------------------------------------\nNumeros Digitados:\n");
	for(int i = 0; i < cont; i++){
		printf("%d ", v[i]);
	}	

	free(v);
	getch();
}