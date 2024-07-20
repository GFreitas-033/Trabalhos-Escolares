#include <stdio.h>
#include <locale.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	
	int x[10]={0},y[10]={0},i,j,aux=0;
	
	printf("Vetor X:\n");
	for(i=0; i<10; i++){
		printf("Digite o %i° número:\n", i+1);
		fflush(stdin);
		scanf("%i", &x[i]);
		y[i]=x[i];
	}
	
	for(i=0; i<10; i++){
		for(j=0; j<10; j++){
			if(x[i]<x[j]){
				aux=y[i];
				y[i]=y[j];
				y[j]=aux;
			}
		}
	}
	
	printf("Vetor X:\n");
	for(i=0; i<10; i++){
		printf("%i\n", x[i]);
	}
	printf("Vetor Crescente:\n");
	for(i=0; i<10; i++){
		printf("%i\n", y[i]);
	}
}
