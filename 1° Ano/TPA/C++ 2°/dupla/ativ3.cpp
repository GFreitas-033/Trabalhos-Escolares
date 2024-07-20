#include <stdio.h>
#include <locale.h>
#include <conio.h>
#include <stdlib.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	int x[10],y[10],z[20],i,j;
	
	printf("Vetor X:\n");
	for(i=0; i<10; i++){
		printf("Digite o %i° número:\n",i);
		fflush(stdin);
		scanf("%i",&x[i]);
	}
	system("cls");
	printf("Vetor Y:\n");
	for(i=0; i<10; i++){
		printf("Digite o %i° número:\n",i);
		fflush(stdin);
		scanf("%i",&y[i]);
	}
	system("cls");
	
	for(i=0; i<10; i++){
		z[i]=x[i];
	}
	
	for(i=0; i<10; i++){
		if(x[i]==y[i]){
			z[i+10]=0;
		}else{
			z[i+10]=y[i];
		}
	}
	
	printf("Resultado:\n");
	for(i=0; i<20; i++){
		if(z[i]>0){
			printf("%i\n",z[i]);
		}
	}
}
