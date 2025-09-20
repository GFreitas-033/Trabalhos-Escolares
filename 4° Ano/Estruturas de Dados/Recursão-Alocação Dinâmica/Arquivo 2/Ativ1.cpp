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
	int n;
	
	printf("Digite o tamanho do vetor:\n");	
	scanf("%d", &n);
	v = (int *) calloc(n, sizeof(int));
	
	if(v == NULL){
		printf("\nErro para alocacao de memoria\n");
	}else{
			
		preencher(n,v);
	
		printf("Os numeros digitados foram: ");
		for(int i=0; i<n; i++){
			printf("%d ", v[i]);
		}	
		free(v);
	}
	getch();
}