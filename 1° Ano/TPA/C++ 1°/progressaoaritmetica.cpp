#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int x,r,i;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite o n�mero inicial:\n");
	fflush(stdin);
	scanf("%i",&x);
	printf("Digite a raz�o:\n");
	fflush(stdin);
	scanf("%i",&r);
	for(i=1; i<11; i++){
		printf("%i\n",x);
		x=x+r;
	}
}
