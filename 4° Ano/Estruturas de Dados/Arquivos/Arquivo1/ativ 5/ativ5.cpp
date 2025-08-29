#include <stdio.h>
#include <stdlib.h>
#include <conio.h>

struct notas{
	char nome[20];
	float nota1;
	float nota2;
	float media;
} aluno;

float calcularMedia(float n1,float n2){
	return (n1+n2)/2;
}

main(){
	struct notas aluno[4];
	FILE *a;
	a = fopen("arquivo.txt","w");
	
	if(a==NULL){
		printf("\nImpossivel abrir o arquivo!!!\n");
	}else{
		for(int i=0; i<4; i++){
			printf("Digite o Nome do %d Aluno:\n", (i+1));
			scanf("%s", &aluno[i].nome);
			printf("Digite a primeira nota do %d Aluno:\n", (i+1));
			scanf("%f", &aluno[i].nota1);
			printf("Digite a segunda nota do %d Aluno:\n", (i+1));
			scanf("%f", &aluno[i].nota2);
			aluno[i].media = calcularMedia(aluno[i].nota1, aluno[i].nota2);
			system("cls");
		}
		fprintf(a,"Nome\tNota1\tNota2\tMedia\n");
		for(int j=0; j<4; j++){
			fprintf(a, "%s\t%2.1f\t%2.1f\t%2.1f\n", aluno[j].nome,aluno[j].nota1,aluno[j].nota2, aluno[j].media);
		}
		printf("Dados Guardados");
	}
	fclose(a);
	getch();
}