#include <stdio.h>
#include <locale.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	
	int x[15]={0},i,j,aux;
	
	for(i=0; i<15; i++){
		printf("Digite o %i° número:\n", i+1);
		fflush(stdin);
		scanf("%i", &x[i]);
	}
	for(i=0; i<15; i++){
		for(j=0; j<i; j++){
			if(x[i]==0){
				aux=x[i];
				x[i]=x[j];
				x[j]=aux;
			}
		}
	}
	for(i=0; i<15; i++){
		for(j=0; j<15; j++){
			if(x[i]<x[j]){
				aux=x[i];
				x[i]=x[j];
				x[j]=aux;
			}
		}
	}
	
	for(i=0; i<15; i++){
		printf("%i\n", x[i]);
	}
}
