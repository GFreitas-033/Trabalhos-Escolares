#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int n1;

	setlocale(LC_ALL, "Portuguese");
	printf("Digite um número:\n");
	fflush(stdin);
	scanf("%i",&n1);

	if(n1<=0)
		do{
			printf("Digite um número maior do que 0:\n");
			fflush(stdin);
			scanf("%i",&n1);
		}while(n1<0);
	
	while(n1>0){
		n1--;
		printf("%i\n",n1);
	}
}
