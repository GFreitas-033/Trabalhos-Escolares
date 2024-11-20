#include <stdio.h>
#include <locale.h>
#include <stdlib.h>

main(){
	int x[10],y[10],z[10],i,j,p=1;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Vetor 1:\n");
	for(i=1; i<=10; i++){
		printf("Digite o %i° número:\n",i);
		fflush(stdin);
		scanf("%i", &x[i]);
		z[i]=0;
	}
	system("cls");
	printf("Vetor 2:\n");
	for(i=1; i<=10; i++){
		printf("Digite o %i° número:\n",i);
		fflush(stdin);
		scanf("%i", &y[i]);
	}
	system("cls");
	for(j=1; j<=10; j++){
		for(i=1; i<=10; i++){
			if(x[j]==y[i]){
				z[p]=y[i];
				p++;
				break;
			}
		}	
	}

	printf("Vetor 1 preenchido:\n");
	for(i=1; i<=10; i++){
		printf("%i\n",x[i]);
	}
	printf("\nVetor 2 preenchido:\n");
	for(i=1; i<=10; i++){
		printf("%i\n",y[i]);
	}
	printf("\nIntersecção dos vetores:\n");
	for(i=1; i<p; i++){
		if(z[i]>0)
		printf("%i\n",z[i]);
	}
}
