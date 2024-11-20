#include <stdio.h>
#include <locale.h>
#include <conio.h>
#include <stdlib.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	int a[10]={0},b[10]={0},c[10]={0},i,j;
	
	printf("Vetor A:\n");
	for(i=0; i<10; i++){
		printf("Digite o %d° número:\n",i);
		fflush(stdin);
		scanf("%d",&a[i]);
		if(a[i]<0){
			do{
				printf("Digite um valor maior do que 0:\n");
				fflush(stdin);
				scanf("%d",&a[i]);
			}while(a[i]<0);
		}
	}
	system("cls");
	printf("Vetor B:\n");
	for(i=0; i<10; i++){
		printf("Digite o %d° número:\n",i);
		fflush(stdin);
		scanf("%d",&b[i]);
		if(b[i]<0){
			do{
				printf("Digite um valor maior do que 0:\n");
				fflush(stdin);
				scanf("%d",&b[i]);
			}while(b[i]<0);
		}
	
	}
	system("cls");
	for(i=0; i<10; i++){
		c[i]=a[i];
	}
	for(i=1; i<=10; i++){
		for(j=0; j<10; j++){
			if(a[i]==b[j]){
				c[i]=0;
			}
		}
	}
	printf("Resultado:\n");
	for(i=0; i<10; i++){
		if(c[i]>0){
			printf("%d\n", c[i]);	
		}
	}
}
