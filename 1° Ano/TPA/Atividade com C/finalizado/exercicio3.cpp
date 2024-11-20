#include <stdio.h>
#include <locale.h>
#include <conio.h>
#include <stdlib.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	float nota[10][4];
	char nome[10];
	int l,c;
	
	printf("Cálculo de notas\n");
	for(l=0; l<=9; l++){
		printf("Digite o nome do %i° aluno:\n",l);
		fflush(stdin);
		scanf("%s", &nome[l]);
		
		for(c=0; c<=2; c++){
			printf("Digite a %i° nota do aluno:\n",c);
			fflush(stdin);
			scanf("%f", &nota[l][c]);
			nota[l][4]+= nota[l][c];
		}
		nota[l][4]/=3;
		system("cls");		
		printf("Cálculo de notas\n");
	}
	system("cls");
	printf("Média dos Alunos\n");
	printf("\n");
	for(l=0; l<=9; l++){
		printf("Aluno(a): %s\n",nome);
		printf("A média desse aluno foi:%6.2f\n",nota[l][4]);
		printf("\n");
	}	
}
