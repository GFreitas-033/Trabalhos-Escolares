#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int n1;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite um número:\n");
	fflush(stdin);
		scanf("%i", &n1);
	if(n1%2==0)
		printf("O número %i é par\n",n1);
	else
		printf("O número %i é impar\n",n1);
}
