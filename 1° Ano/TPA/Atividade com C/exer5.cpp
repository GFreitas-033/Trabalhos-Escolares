#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int n1;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite um n�mero:\n");
	fflush(stdin);
		scanf("%i", &n1);
	if(n1%2==0)
		printf("O n�mero %i � par\n",n1);
	else
		printf("O n�mero %i � impar\n",n1);
}
