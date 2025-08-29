#include <stdio.h>

struct dados{
	char nome[30];
	char sexo;
	char cor;
	float altura;
	float peso;
} pessoa;

main(){
	FILE *a;
	a = fopen("dados.txt","r");
	struct dados pessoa[10];
	
	for(int i=0; i<10; i++){
		fscanf(a,"%s %c %c %3f %5f",&pessoa[i].nome,&pessoa[i].sexo,&pessoa[i].cor,&pessoa[i].altura,&pessoa[i].peso);
	}
	for(int i=0; i<10; i++){
		pessoa[i].peso = pessoa[i].peso/100;
		pessoa[i].altura = pessoa[i].altura/100;
	}
	printf("\n----------------------------------------------\n");
	for(int i=0; i<10; i++){
		printf("Nome: %s\n", pessoa[i].nome);
		printf("Sexo: %c\n", pessoa[i].sexo);
		printf("Cor dos Olhos: %c\n", pessoa[i].cor);
		printf("Altura: %1.2f\n", pessoa[i].altura);
		printf("Peso: %3.2f\n", pessoa[i].peso);
		printf("\n----------------------------------------------\n");
	}
}