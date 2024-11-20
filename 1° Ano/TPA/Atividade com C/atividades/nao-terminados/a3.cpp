#include <stdio.h>
#include <locale.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	
	int x[20]={0},i,c;
	
	for(i=0; i<20; i++){
		printf("Digite o %i° número:\n", i+1);
		fflush(stdin);
		scanf("%i", &x[i]);
	}
	
	for(i=0; i<20; i++){
		for(c=0; c<20; c++){
			if(x[i]==x[c]){
				do{
					x[i]=0;	
				}while(x[i]==x[c]);
			}
			break;
		}
	}
	
	printf("Números diferentes:\n");
	for(i=0; i<20; i++){
		if(x[i]>0){
			printf("%i\n",x[i]);
		}
	}
}
