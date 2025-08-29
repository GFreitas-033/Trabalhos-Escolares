#include <stdio.h>
#include <stdlib.h>

struct dados{
	char nome[20];
	char telefone[11];
	char email[30];
} pacientes;

main(){
	FILE *a;
	a = fopen("arquivo.txt","w");
	int qtd;
	
	if(a==NULL){
		printf("\nImpossivel abrir o arquivo!!!\n");
	}else{
		printf("Quantidade de Pacientes para Cadastro:");
		scanf("%d", &qtd);
		struct dados pacientes[qtd];
		
		for(int i=0; i<qtd; i++){
			printf("Digite o Nome do %d Paciente:\n", (i+1));
			scanf("%s", &pacientes[i].nome);
			
			printf("Digite o Telefone do %d Paciente: XXXXXXXXX\n", (i+1));
			scanf("%s", &pacientes[i].telefone);
			
			printf("Digite o Email do %d Paciente:\n", (i+1));
			scanf("%s", &pacientes[i].email);
			
			system("cls");
		}
		
		for(int i=0; i<qtd; i++){
			fprintf(a,"%d \t Nome: %s \t Telefone: %s \t Email: %s\n", (i+1), pacientes[i].nome, pacientes[i].telefone, pacientes[i].email);
		}
		
		printf("Dados Guardados");
	}
	fclose(a);
}