#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int i,ma,me,p1,p2,x[10];
	
	setlocale(LC_ALL, "Portuguese");
	
	printf("Digite o 1� n�mero:\n");
	fflush(stdin);
	scanf("%i", &x[1]);
	ma=x[1];
	me=x[1];
	p1=1;
	p2=1;
	
	for(i=2; i<=10; i++){
		printf("Digite o %i� n�mero:\n",i);
		fflush(stdin);
		scanf("%i", &x[i]);
		
		if(x[i]>ma){
			ma=x[i];
			p1=i;
		}
		if(x[i]<me){
			me=x[i];
			p2=i;
		}
		}
		printf("O maior n�mero �: %i e sua posi��o no vetor �: %i� lugar\n",ma,p1);
		printf("O menor n�mero �: %i e sua posi��o no vetor �: %i� lugar",me,p2);
	}
