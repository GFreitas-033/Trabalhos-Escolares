#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int n1,n2;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite o 1� n�mero:\n");
	fflush(stdin);
	scanf("%i",&n1);
	printf("Digite o 2� n�mero:\n");
	fflush(stdin);
	scanf("%i",&n2);
	
	if(n1>n2)
		do{
			printf("O 1� n�mero precisa ser menor do que o 2� n�mero:\n");
			fflush(stdin);
			scanf("%i",&n1);
		}while(n1>n2);
		
	while(n1<n2){
		printf("%i\n",n1);
		n1++;
	}
		printf("%i",n2);
}
