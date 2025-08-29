#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int menu(){
	int e;
	printf("Menu de Opcao:\n");
	printf("1 - Adicionar Novo Nome\n");
	printf("2 - Ver Nomes Existentes\n");
	scanf("%d", &e);
	return e;
}

main(){
	FILE *a, *b;
	int escolha;
	
	escolha = menu();
	system("cls");
	
	if(escolha==1){
		char nome[20];
		a = fopen("arquivo.txt","a");
		
		if(a==NULL){
			printf("\nImpossivel abrir o arquivo!!!\n");
		}else{
			printf("Escreva um Nome:\n");
			scanf("%s", &nome);
			fprintf(a,"Nome: ");
			for(int i=0; i<strlen(nome); i++){
				fputc(nome[i], a);
			}
			fprintf(a,"; ");
			fclose(a);
		}
	}
	if(escolha==2){
		char letra;
		b = fopen("arquivo.txt","r");
		
		if(b==NULL){
			printf("\nImpossivel abrir o arquivo!!!\n");
		}else{
			int j=0;
			char printar[100];
			printf("Leitura do Arquivo:\n");
			while((letra=fgetc(b)) != EOF){
				printar[j] = letra;
				j++;
			}
			printf("%s", printar);
			fclose(b);
		}
	}
}
