#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <conio.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	int m[2][2],r[2][2];
	int l,c,maior;
	
	printf("Preencha a matriz:\n");
	for(l=1; l<=2; l++){
		for(c=1; c<=2; c++){
			printf("Matriz [%i,%i]:\n",m[l][c]);
			fflush(stdin);
			scanf("%i",&m[l][c]);
		}
	}
	for(l=1; l<=2;l++){
		for(c=1; c<=2;c++){
			if(m[l][c]>maior)
			maior=m[l][c];
		}
	}
	system("cls");
	printf("Matriz M:\n");
	for(l=1; l<=2;l++){
		for(c=1; c<=2;c++){
			r[l][c]= m[l][c]*maior;
		}
		printf(" ");
	}
	printf("Matriz R:\n");
	for(l=1; l<=2;l++){
		for(c=1; c<=2;c++){
			printf("%i", r[l][c]);
		}
		printf(" ");
	}
}
