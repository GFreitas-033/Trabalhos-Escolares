#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>

struct pessoas{
	char nome[30];
	int idade;
	float altura;
};

int menu(){
	int op;
	do{
		printf("----------------------------------\n");
		printf("\tMenu de Escolhas\n");
		printf("----------------------------------\n");
		printf("1 - Cadastrar Pessoa\n");
		printf("2 - Exibir todos os Registros\n");
		printf("3 - Buscar pessoa por nome\n");
		printf("4 - Atualizar um registro pelo nome\n");
		printf("5 - Remover um registro pelo nome\n");
		printf("6 - Exportar dados para CSV\n");
		printf("----------------------------------\n");
		printf("7 - Numero total de Pessoas\n");
		printf("8 - Media de Idade\n");
		printf("9 - Pessoa mais Alta\n");
		printf("10 - Pessoa mais Velha\n");
		printf("----------------------------------\n");
		printf("0 - Sair\n");
		printf("----------------------------------\n");
		scanf("%d", &op);
		system("cls");
	} while (op<0 || op>10);
	return op;
}

void inserir(){
	FILE *a;
	a = fopen("pessoas.bin","ab");
	struct pessoas pessoa;
	
	printf("Digite o Nome da Pessoa:\n");
	fflush(stdin);
	gets(pessoa.nome);
	printf("Digite a Idade da Pessoa:\n");
	scanf("%d", &pessoa.idade);
	fflush(stdin);
	printf("Digite a Altura da Pessoa:\n");
	scanf("%f", &pessoa.altura);
	fflush(stdin);
	fwrite(&pessoa, sizeof(struct pessoas), 1, a);
	
	system("cls");
	fclose(a);
}

void listar(){
	FILE *a;
	a = fopen("pessoas.bin", "rb");
	struct pessoas pessoa;

	while(fread(&pessoa, sizeof(struct pessoas), 1, a) == 1){
		printf("Nome da Pessoa: \t%s\n", pessoa.nome);
		printf("Idade da Pessoa: \t%d\n", pessoa.idade);
		printf("Altura da Pessoa: \t%.2f\n", pessoa.altura);
		printf("----------------------------------\n");
	}
	
	getch();
	system("cls");
	fclose(a);
}

void pesquisar(){
	FILE *a;
	a = fopen("pessoas.bin","rb");
    struct pessoas pessoa;
	char nomePessoa[30];
	int encontrado=1;
	
	printf("Qual o Nome da Pessoa a ser Pesquisada:\n");
	fflush(stdin);
	gets(nomePessoa);
	
	while (fread(&pessoa, sizeof(struct pessoas), 1, a) == 1) {
        if (strcmp(pessoa.nome, nomePessoa) == 0) {
		    printf("\n----------------------------------\n");
           	printf("Nome da Pessoa: %s\n", pessoa.nome);
			printf("Idade da Pessoa: %d\n", pessoa.idade);
			printf("Altura da Pessoa: %.2f\n", pessoa.altura);
			printf("----------------------------------\n");
			encontrado = 1;
        } else {
        	encontrado = 0;
		}
    }
    
	fclose(a);
    
   	if (encontrado == 1) {
        printf("Registro alterado com sucesso!\n");
    } else {
        printf("Pessoa nao encontrado.\n");
    }	
    
	getch();
	system("cls");
}

void alterar(){
	FILE *a, *b;
	a = fopen("pessoas.bin","rb");
	b = fopen("temp.bin", "wb");
    struct pessoas pessoa;
	char nomePessoa[30];
	int encontrado;
	
	printf("Qual o Nome da Pessoa a ser Alterada:\n");
	fflush(stdin);
	gets(nomePessoa);
	
	while (fread(&pessoa, sizeof(struct pessoas), 1, a) == 1) {
        if (strcmp(pessoa.nome, nomePessoa) != 0) {
            fwrite(&pessoa, sizeof(struct pessoas), 1, b);
            encontrado = 0;
        } else {
        	printf("Digite o Nome da Pessoa:\n");
        	fflush(stdin);
			gets(pessoa.nome);
			printf("Digite a Idade da Pessoa:\n");
			scanf("%d", &pessoa.idade);
			fflush(stdin);
			printf("Digite a Altura da Pessoa:\n");
			scanf("%f", &pessoa.altura);
			fflush(stdin);
            fwrite(&pessoa, sizeof(struct pessoas), 1, b);
            
			encontrado = 1;
        }
    }
    
	fclose(a);
	fclose(b);
	
	remove("pessoas.bin");
    rename("temp.bin", "pessoas.bin");
	
	if (encontrado == 1) {
        printf("Registro alterado com sucesso!\n");
    } else {
        printf("Pessoa nao encontrado.\n");
    }
	
	getch();
	system("cls");
}

void excluir(){
	FILE *a, *b;
	a = fopen("pessoas.bin","rb");
	b = fopen("temp.bin", "wb");
    struct pessoas pessoa;
	char nomePessoa[30];
	int encontrado;
	
	printf("Qual o Nome da pessoa a ser Excluida:\n");
	fflush(stdin);
	gets(nomePessoa);
	
	while (fread(&pessoa, sizeof(struct pessoas), 1, a) == 1) {
        if (strcmp(pessoa.nome, nomePessoa) != 0) {
            fwrite(&pessoa, sizeof(struct pessoas), 1, b);
            encontrado = 0;
        } else {
            encontrado = 1;
        }
    }
    
	fclose(a);
	fclose(b);
	
	remove("pessoas.bin");
    rename("temp.bin", "pessoas.bin");
    
	if (encontrado == 1) {
        printf("Registro excluido com sucesso!\n");
    } else {
        printf("Pessoa nao encontrado.\n");
    }
    
	getch();
	system("cls");
}

void exportar(){
	FILE *a, *b;
	a = fopen("pessoas.bin","rb");
	b = fopen("arquivo.csv", "w");
    struct pessoas pessoa;
	
	while (fread(&pessoa, sizeof(struct pessoas), 1, a) == 1) {
        fprintf(b, "Nome: %s; Idade: %d; Altura: %.2f;\n", pessoa.nome, pessoa.idade, pessoa.altura);
    }
    
    printf("Exportacao Realizada!!!\n");
    
	fclose(a);
	fclose(b);
	
	getch();
	system("cls");
}

void qtdPessoa(){
	FILE *a;
	a = fopen("pessoas.bin", "rb");
	struct pessoas pessoa;
	int i=0;
	
	while((fread(&pessoa, sizeof(struct pessoas), 1, a)) == 1){
		i++;
	}
	
	printf("Total de Pessoas: %d\n", i);
	
	getch();
	system("cls");
	fclose(a);
}

void mediaIdade(){
	FILE *a;
	a = fopen("pessoas.bin", "rb");
	struct pessoas pessoa;
	int i=0;
	float alturas;
	
	while((fread(&pessoa, sizeof(struct pessoas), 1, a)) == 1){
		alturas += pessoa.altura;
		i++;
	}
	
	printf("\tMedia de Altura: %.2f\n", (alturas/i));
	
	getch();
	system("cls");
	fclose(a);
}

void pessoaAlta(){
	FILE *a;
	a = fopen("pessoas.bin", "rb");
	struct pessoas pessoa;
	char nomePessoa[30];
	int i=0;
	float maiorAltura;
	
	while((fread(&pessoa, sizeof(struct pessoas), 1, a)) == 1){
		if(i==0){
			strcpy(nomePessoa, pessoa.nome);
			maiorAltura = pessoa.altura;
			i++;
		}else{
			if(pessoa.altura > maiorAltura){
				strcpy(nomePessoa, pessoa.nome);
				maiorAltura = pessoa.altura;
			}
		}
	}
	
	printf("Pessoa Mais Alta e: %s com: %.2f de altura\n", nomePessoa, maiorAltura);
	
	getch();
	system("cls");
	fclose(a);
}

void pessoaVelha(){
	FILE *a;
	a = fopen("pessoas.bin", "rb");
	struct pessoas pessoa;
	char nomePessoa[30];
	int i=0, maiorIdade;
	
	while((fread(&pessoa, sizeof(struct pessoas), 1, a)) == 1){
		if(i==0){
			strcpy(nomePessoa, pessoa.nome);
			maiorIdade = pessoa.idade;
			i++;
		}else{
			if(pessoa.idade > maiorIdade){
				strcpy(nomePessoa, pessoa.nome);
				maiorIdade = pessoa.idade;
			}
		}
	}
	
	printf("Pessoa Mais Velha e: %s com: %d anos de idade\n", nomePessoa, maiorIdade);
	
	getch();
	system("cls");
	fclose(a);
}

main(){
	int laco=0;
	while(laco==0){
		int opcao = menu();
	
		switch(opcao){
			case 1: inserir(); break;
			case 2: listar(); break;
			case 3: pesquisar(); break;
			case 4: alterar(); break;
			case 5: excluir(); break;
			case 6: exportar(); break;
			
			case 7: qtdPessoa(); break;
			case 8: mediaIdade(); break;
			case 9: pessoaAlta(); break;
			case 10: pessoaVelha(); break;
			
			default: laco = 1;		
		}
	}
	
	printf("----------------------------------\n");
	printf("\tSistema Encerrado\n");
	printf("----------------------------------\n");
}