#include <stdio.h>
#include <locale.h>
#include <conio.h>
#include <stdlib.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	float x[5],y[5],a[5],s[5],m[5],d[5];
	int i,j;
	
	printf("Vetor X:\n");
	for(i=1; i<=5; i++){
		printf("Digite o %i� n�mero:\n",i);
		fflush(stdin);
		scanf("%f",&x[i]);
	}
	system("cls");
	printf("Vetor Y:\n");
	for(i=1; i<=5; i++){
		printf("Digite o %i� n�mero:\n",i);
		fflush(stdin);
		scanf("%f",&y[i]);
	}
	system("cls");
	
	for(i=1; i<=5; i++){
		a[i]= x[i] + y[i];
		s[i]= x[i] - y[i];
		m[i]= x[i] * y[i];
		d[i]= x[i] / y[i];	
	}
	for(i=1; i<=5; i++){
		printf("Adi��o:%6.2f\n",a[i]);
		printf("Subtra��o:%6.2f\n",s[i]);
		printf("Multiplica��o:%6.2f\n",m[i]);
		printf("Divis�o:%6.2f\n",d[i]);
		printf("\n");
	}
}
