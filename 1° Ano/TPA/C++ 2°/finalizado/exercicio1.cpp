#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <conio.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	int m[2][2]={0},r[2][2]={0};
	int l,c,maior=0;
	
	printf("Preencha a matriz:\n");
	for(l=-0; l<=1; l++){
		for(c=0; c<=1; c++){
			printf("Matriz [%i,%i:]\n",l,c);
			fflush(stdin);
			scanf("%i",&m[l][c]);		
		}
	}
	
	for(l=0; l<=1;l++){
		for(c=0; c<=1;c++){
			if(m[l][c]>maior){
				maior=m[l][c];
			}
		}
	}
	for(l=0; l<=1;l++){
		for(c=0; c<=1;c++){
			r[l][c]=m[l][c]*maior;
		}
	}
	system("cls");
	
	printf("Matriz M:\n");
	for(l=0; l<=1;l++){
		for(c=0; c<=1;c++){
			printf("%i ", m[l][c]);
		}
		printf("\n");
	}
	printf("Matriz R:\n");
	for(l=0; l<=1;l++){
		for(c=0; c<=1;c++){
			printf("%i ", r[l][c]);
		}
		printf("\n");
	}
}
