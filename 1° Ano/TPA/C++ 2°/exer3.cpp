#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	float s,a,p;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite seu sal�rio:\n");
	fflush(stdin);
		scanf("%f", &s);
	printf("Digite a porcentagem de aumento:\n");
	fflush(stdin);
		scanf("%f", &a);
	p = (s/100)*a;
	p = p+s;
	printf("Valor do sal�rio final:%5.2f\n",p);
}
