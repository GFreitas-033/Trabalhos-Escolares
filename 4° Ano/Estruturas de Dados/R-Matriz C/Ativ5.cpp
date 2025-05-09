#include <stdio.h>
#include <conio.h>

main(){
	int t=0, x=0;
	
	printf("Qual vai ser o Tamnho:\n");
	scanf("%d", &t);
	
	int matriz[t][t], vetor[t], resultado[t];
	
	printf("Preencha a Matriz: \n");
	for(int i=0; i<t; i++){
		for(int j=0; j<t; j++){
			scanf("%d", &matriz[i][j]);
		}
	}
	printf("Preencha o Vetor: \n");
	for(int i=0; i<t; i++){
		scanf("%d", &vetor[i]);
	}

	for(int i=0; i<t; i++){	
		x=0;
		for(int j=0; j<t; j++){
			x += matriz[i][j];
		}
		resultado[i] = (vetor[i]+x);
	}
	
	for(int i=0; i<t; i++){
		printf("%d ",resultado[i]);
	}
}