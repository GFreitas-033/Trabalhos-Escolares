#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int n1,n2;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite um número:\n");
	fflush(stdin);
	scanf("%i", &n1);
	n2 = n1-1;
	printf("O antecessor do número: %i é:%i\n",n1,n2);
}
