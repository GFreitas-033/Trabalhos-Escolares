#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int n1,n2;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite um n�mero:\n");
	fflush(stdin);
	scanf("%i", &n1);
	n2 = n1-1;
	printf("O antecessor do n�mero: %i �:%i\n",n1,n2);
}
