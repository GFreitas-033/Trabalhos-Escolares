#include <stdio.h>
#include <stdlib.h>

struct notas{
	char nome[20];
	float nota1;
	float nota2;
	float media;
} aluno;

float calcularMedia(float n1,float n2){
	return (n1+n2)/2;
}

void imprimirResultado(char *n,float n1,float n2,float m){
	printf("Nome do Aluno: ");
	puts(n);
	printf("Primeira Nota: %2.1f\n",n1);
	printf("Segunda Nota: %2.1f\n",n2);
	printf("Media Final: %2.1f\n", m);
}

main(){
	struct notas aluno;
	
	printf("Digite o Nome do Aluno:\n");
	gets(aluno.nome);
	printf("Digite a primeira nota do Aluno:\n");
	scanf("%f", &aluno.nota1);
	printf("Digite a segunda nota do Aluno:\n");
	scanf("%f", &aluno.nota2);
	system("cls");
	aluno.media = calcularMedia(aluno.nota1, aluno.nota2);
	imprimirResultado(aluno.nome,aluno.nota1,aluno.nota2,aluno.media);
}