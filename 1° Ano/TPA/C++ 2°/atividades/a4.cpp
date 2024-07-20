#include <stdio.h>
#include <locale.h>
#include <stdlib.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	
	int x[10]={0},y[10]={0},z[20]={0},i,c=0,j=0;
	
	printf("Vetor X:\n");
	for(i=0; i<10; i++){
		printf("Digite o %i° número:\n", i+1);
		fflush(stdin);
		scanf("%i", &x[i]);
	}
	system("cls");
	
	printf("Vetor Y:\n");
	for(i=0; i<10; i++){
		printf("Digite um número:\n");
		fflush(stdin);
		scanf("%i", &y[i]);
	}
	system("cls");
	
	for(i=0; i<20; i++){
		if(1%2==0){
			z[i]=x[j];
			j++;
		}else{
			z[i]=y[c];
			c++;
		}
	}
	
	printf("Vetor Z:\n");
	for(i=0; i<20; i++){
		printf("%i\n",z[i]);
	}
}
