#include <stdio.h>
#include <locale.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	
	int x[10]={0},i,c;
	
	for(i=0; i<10; i++){
		printf("Digite o %i° número:\n", i+1);
		fflush(stdin);
		scanf("%i", &x[i]);
	}
	
	for(i=0; i<10; i++){
		for(c=0; c<10; c++){
			if(x[i]!=x[c]){
				x[i]=0;
			}
			break;
		}
	}
	
	printf("Números iguais:\n");
	for(i=0; i<10; i++){
		if(x[i]>0){
			printf("%i\n",x[i]);
		}
	}
}
