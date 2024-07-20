#include <stdio.h>
#include <locale.h>
#include <conio.h>
#include <stdlib.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	int m[2][2]={0},r[2][2]={0},l=0,c=0;
	
	printf("Preencha a Matriz:\n");
	for(l=0; l<=1; l++){
		for(c=0; c<=1; c++){
			printf("Matriz [%i,%i]:\n",l,c);
			fflush(stdin);
			scanf("%i", &m[l][c]);
			if(m[l][c]%2==0){
				r[l][c]=m[l][c]+5;
			}else{
				r[l][c]=m[l][c]+8;
			}
		}
	}
	
	system("cls");
	printf("Matriz M:\n");
	for(l=0; l<=1; l++){
		for(c=0; c<=1; c++){
			printf("%i ",m[l][c]);
		}
		printf("\n");
	}
	printf("Matriz R:\n");
	for(l=0; l<=1; l++){
		for(c=0; c<=1; c++){
			printf("%i ",r[l][c]);
		}
		printf("\n");
	}
}
