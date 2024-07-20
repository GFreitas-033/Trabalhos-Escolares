#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int n1,f;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite um número para calcular o fatorial:\n");
	fflush(stdin);
	scanf("%d", &n1);
	f=1;
	
	while(n1>0){
		f*=n1;
		n1--;
	}
	printf("\nO resultado da fatorial: %d",f);
}
