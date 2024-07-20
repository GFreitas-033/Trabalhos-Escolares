#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int x,r,i;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite o número inicial:\n");
	fflush(stdin);
	scanf("%i",&x);
	printf("Digite a razão:\n");
	fflush(stdin);
	scanf("%i",&r);
	for(i=1; i<11; i++){
		printf("%i\n",x);
		x=x+r;
	}
}
