#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int i,somai,somap,n1;
	
	setlocale(LC_ALL, "Portuguese");
	somai=0;
	somap=0;
	for(i=1; i<11 ; i++){
		printf("Digite o %i� n�mero:\n",i);
		fflush(stdin);
		scanf("%i",&n1);
		if(n1<=0)
			do{
				printf("Digite um n�mero maior do que 0:\n");
				fflush(stdin);
				scanf("%i",&n1);
			}while(n1<0);
		if(n1%2==0)
			somai+=n1;
		else
			somap+=n1;
	}
		printf("A soma dos n�meros pares �:%i",somai);
		printf("\nA soma dos n�meros impares �:%i",somap);
}
