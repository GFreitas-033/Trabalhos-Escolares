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

float imprimirResultado(char *n,float n1,float n2,float m){
	printf("Nome do Aluno: ");
	puts(n);
	printf("Primeira Nota: %2.1f\n",n1);
	printf("Segunda Nota: %2.1f\n",n2);
	printf("Media Final: %2.1f\n", m);
	getch();
	system("cls");
	return m;
}

main(){
	struct notas aluno[10];
	float cont = 0;
	
	for(int i=0; i<10; i++){
		printf("Digite o Nome do %d Aluno:\n", (i+1));
		scanf("%s", &aluno[i].nome);
		printf("Digite a primeira nota do %d Aluno:\n", (i+1));
		scanf("%f", &aluno[i].nota1);
		printf("Digite a segunda nota do %d Aluno:\n", (i+1));
		scanf("%f", &aluno[i].nota2);
		aluno[i].media = calcularMedia(aluno[i].nota1, aluno[i].nota2);
		system("cls");
	}
	for(int i=0; i<10; i++){
		cont += imprimirResultado(aluno[i].nome,aluno[i].nota1,aluno[i].nota2,aluno[i].media);
	}
	
	printf("Media Geral da Sala: %4.1f", (cont/10));
}