#include <stdio.h>
#include <locale.h>

main(){
	int i,x[10];
	
	setlocale(LC_ALL, "Portuguese");
	for(i=1; i<=10; i++){
		printf("Digite o %i° número:\n",i);
		fflush(stdin);
		scanf("%i", &x[i]);
	}
	printf("Vetor inverso:\n");
	for(i=10; i>=1; i--){
		printf("%i\n",x[i]);
	}
}
