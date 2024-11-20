#include <stdio.h>
#include <locale.h>
#include <stdlib.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	int x[10],i;
	
	for(i=1; i<=10; i++){
		printf("Digite o %i° número:\n",i);
		fflush(stdin);
		scanf("%i",&x[i]);
		if(x[i]<0){
			x[i]=0;
		}
	}
	system("cls");
	printf("Vetor final:\n");
	for(i=1; i<=10; i++){
		printf("%i\n",x[i]);
	}
}
