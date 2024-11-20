#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int i,somai,somap,n1;
	
	setlocale(LC_ALL, "Portuguese");
	somai=0;
	somap=0;
	for(i=1; i<11 ; i++){
		printf("Digite o %i° número:\n",i);
		fflush(stdin);
		scanf("%i",&n1);
		if(n1<=0)
			do{
				printf("Digite um número maior do que 0:\n");
				fflush(stdin);
				scanf("%i",&n1);
			}while(n1<0);
		if(n1%2==0)
			somai+=n1;
		else
			somap+=n1;
	}
		printf("A soma dos números pares é:%i",somai);
		printf("\nA soma dos números impares é:%i",somap);
}
