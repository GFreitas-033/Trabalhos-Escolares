#include <stdio.h>
#include <locale.h>
#include <stdlib.h>

int verificarigual(int c,int f[],int t){
	int g;
	
	for(g=0; g<t; g++){
		while(c==f[t]){	
			if(c==f[g]){
			do{
				printf("Esse número já foi digitado, digite outro:\n");
				fflush(stdin);
				scanf("%i", &c);
			}while(c==f[g]);
			}
		}
	}
	return c;
}

main(){
	setlocale(LC_ALL, "Portuguese");
	
	int n1[10]={0},i,j;
	
	for(i=0; i<10; i++){
		printf("%i° número:\n",i+1);
		fflush(stdin);
		scanf("%i", &n1[i]);
		n1[i]=verificarigual(n1[i],n1,i);
	}

	system("cls");
	printf("Vetor Final:\n");
	for(i=0; i<10; i++){
		printf("%i\n", n1[i]);
	}
}
