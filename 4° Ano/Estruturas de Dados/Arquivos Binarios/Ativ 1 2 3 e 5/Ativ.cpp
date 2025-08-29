#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>

#include <math.h>

struct paciente{
	char nome[50];
	int idade;
	float altura;
	float peso;
	float imc;
};

void categoria(float var){
	if(var<=18.5){
		printf("Abaixo do Peso\n");
	}else if(var>18.5 && var<=24.9){
		printf("Peso Ideal\n");
	}else if(var>24.9 && var<=29.9){
		printf("Levemente Acima do Peso");
	}else if(var>29.9 && var<=34.9){
		printf("Obesidade grau I\n");
	}else if(var>34.9 && var<=39.9){
		printf("Obesidade grau II\n");
	}else if(var>39.9){
		printf("Obesidade grau III\n");
	}
}

int menu(){
	int op;
	do{
		printf("----------------------------------\n");
		printf("\tMenu de Escolhas\n");
		printf("----------------------------------\n");
		printf("1 - Inserir\n");
		printf("2 - Alterar Dados do Paciente\n");
		printf("3 - Excluir por Nome\n");
		printf("4 - Listar Todos\n");
		printf("5 - Pesquisar\n");
		printf("6 - Excluir Todos\n");
		
		printf("7 - Exibir pacientes obesos\n");
		printf("8 - Exibir pacientes maiores que 1,70m\n");
		printf("9 - Exibir pacientes entre 20 e 50 anos\n");
		printf("10 - Exibir pacientes saudaveis\n");
		printf("11 - Excluir pacientes com menos de 50kg\n");
		printf("12 - Sugestao de peso pela altura\n");
		printf("13 - Sugestao de altura pelo peso\n");
		
		printf("0 - Sair\n");
		printf("----------------------------------\n");
		scanf("%d", &op);
		system("cls");
	} while (op<0 || op>13);
	return op;
}

void inserir(){
	FILE *a;
	a = fopen("arquivo.dat","ab");
	struct paciente pessoa;
	
	printf("Digite o Nome do Paciente:\n");
	fflush(stdin);
	gets(pessoa.nome);
	printf("Digite a Idade do Paciente:\n");
	scanf("%d", &pessoa.idade);
	fflush(stdin);
	printf("Digite a Altura do Paciente:\n");
	scanf("%f", &pessoa.altura);
	fflush(stdin);
	printf("Digite o Peso do Paciente:\n");
	scanf("%f", &pessoa.peso);
	fflush(stdin);
	pessoa.imc = pessoa.peso/(pessoa.altura*pessoa.altura);
	fwrite(&pessoa, sizeof(struct paciente), 1, a);
	
	system("cls");
	fclose(a);
}

void listar(){
	FILE *a;
	a = fopen("arquivo.dat", "rb");
	struct paciente pessoa;
	int i=0;
	
	while((fread(&pessoa, sizeof(struct paciente), 1, a)) == 1){
		printf("Nome do Paciente: \t%s\n", pessoa.nome);
		printf("Idade do Paciente: \t%d\n", pessoa.idade);
		printf("Altura do Paciente: \t%.2f\n", pessoa.altura);
		printf("Peso do Paciente: \t%.2f\n", pessoa.peso);
		printf("IMC do Paciente: \t%.2f\n", pessoa.imc);
		printf("\nCategoria: ");
		categoria(pessoa.imc);
		printf("----------------------------------\n");
		i++;
	}
	
	printf("\tTotal de Pacientes: %d\n", i);
	
	getch();
	system("cls");
	fclose(a);
}

void alterar(){
	FILE *a, *b;
	a = fopen("arquivo.dat","rb");
	b = fopen("temp.dat", "wb");
    struct paciente pessoa;
	char nomePessoa[50];
	int encontrado;
	
	printf("Qual o Nome do Paciente a ser Alterado:\n");
	fflush(stdin);
	gets(nomePessoa);
	
	while (fread(&pessoa, sizeof(struct paciente), 1, a) == 1) {
        if (strcmp(pessoa.nome, nomePessoa) != 0) {
            fwrite(&pessoa, sizeof(struct paciente), 1, b);
            encontrado = 0;
        } else {
        	printf("Digite o Nome do Paciente:\n");
        	fflush(stdin);
			gets(pessoa.nome);
			printf("Digite a Idade do Paciente:\n");
			scanf("%d", &pessoa.idade);
			fflush(stdin);
			printf("Digite a Altura do Paciente:\n");
			scanf("%f", &pessoa.altura);
			fflush(stdin);
			printf("Digite o Peso do Paciente:\n");
			scanf("%f", &pessoa.peso);
			fflush(stdin);
			pessoa.imc = pessoa.peso/(pessoa.altura*pessoa.altura);
            fwrite(&pessoa, sizeof(struct paciente), 1, b);
            
			encontrado = 1;
        }
    }
    
	fclose(a);
	fclose(b);
	
	remove("arquivo.dat");
    rename("temp.dat", "arquivo.dat");
	
	if (encontrado == 1) {
        printf("Registro alterado com sucesso!\n");
    } else {
        printf("Paciente nao encontrado.\n");
    }
	
	getch();
	system("cls");
}

void excluir(){
	FILE *a, *b;
	a = fopen("arquivo.dat","rb");
	b = fopen("temp.dat", "wb");
    struct paciente pessoa;
	char nomePessoa[50];
	int encontrado;
	
	printf("Qual o Nome do Paciente a ser Excluido:\n");
	fflush(stdin);
	gets(nomePessoa);
	
	while (fread(&pessoa, sizeof(struct paciente), 1, a) == 1) {
        if (strcmp(pessoa.nome, nomePessoa) != 0) {
            fwrite(&pessoa, sizeof(struct paciente), 1, b);
            encontrado = 0;
        } else {
            encontrado = 1;
        }
    }
    
	fclose(a);
	fclose(b);
	
	remove("arquivo.dat");
    rename("temp.dat", "arquivo.dat");
    
	if (encontrado == 1) {
        printf("Registro excluido com sucesso!\n");
    } else {
        printf("Paciente nao encontrado.\n");
    }
    
	getch();
	system("cls");
}

void pesquisar(){
	FILE *a;
	a = fopen("arquivo.dat","rb");
    struct paciente pessoa;
	char nomePessoa[50];
	
	printf("Qual o Nome do Paciente a ser Pesquisado:\n");
	fflush(stdin);
	gets(nomePessoa);
	
	while (fread(&pessoa, sizeof(struct paciente), 1, a) == 1) {
        if (strcmp(pessoa.nome, nomePessoa) == 0) {
        	printf("\n----------------------------------\n");
           	printf("Nome do Paciente: %s\n", pessoa.nome);
			printf("Idade do Paciente: %d\n", pessoa.idade);
			printf("Altura do Paciente: %.2f\n", pessoa.altura);
			printf("Peso do Paciente: %.2f\n", pessoa.peso);
			printf("IMC do Paciente: %.2f\n", pessoa.imc);
			printf("----------------------------------\n");
        }
    }
    
	fclose(a);
    
	getch();
	system("cls");
}

void excluirAll(){
	FILE *a;
	a = fopen("arquivo.dat", "wb");
	
	fclose(a);
	
	printf("Todos os Registros foram Apagados\n");
	
	getch();
	system("cls");
}

void obesos(){
	FILE *a;
	a = fopen("arquivo.dat", "rb");
	struct paciente pessoa;
	int i=0;
	
	while((fread(&pessoa, sizeof(struct paciente), 1, a)) == 1){
		if(pessoa.imc>29.9){
			printf("Nome do Paciente: \t%s\n", pessoa.nome);
			printf("Idade do Paciente: \t%d\n", pessoa.idade);
			printf("Altura do Paciente: \t%.2f\n", pessoa.altura);
			printf("Peso do Paciente: \t%.2f\n", pessoa.peso);
			printf("IMC do Paciente: \t%.2f\n", pessoa.imc);
			printf("----------------------------------\n");
			i++;
		}
	}
	
	printf("\tTotal de Pacientes Obesos: %d\n", i);
	
	getch();
	system("cls");
	fclose(a);
}

void altura(){
	FILE *a;
	a = fopen("arquivo.dat", "rb");
	struct paciente pessoa;
	int i=0;
	
	while((fread(&pessoa, sizeof(struct paciente), 1, a)) == 1){
		if(pessoa.altura>1.71){
			printf("Nome do Paciente: \t%s\n", pessoa.nome);
			printf("Idade do Paciente: \t%d\n", pessoa.idade);
			printf("Altura do Paciente: \t%.2f\n", pessoa.altura);
			printf("Peso do Paciente: \t%.2f\n", pessoa.peso);
			printf("IMC do Paciente: \t%.2f\n", pessoa.imc);
			printf("----------------------------------\n");
			i++;
		}
	}
	
	printf("Total de Pacientes Maiores que 1.70m: %d\n", i);
	
	getch();
	system("cls");
	fclose(a);
}

void idade(){
	FILE *a;
	a = fopen("arquivo.dat", "rb");
	struct paciente pessoa;
	int i=0;
	
	while((fread(&pessoa, sizeof(struct paciente), 1, a)) == 1){
		if(pessoa.idade>=20 && pessoa.idade<=50){
			printf("Nome do Paciente: \t%s\n", pessoa.nome);
			printf("Idade do Paciente: \t%d\n", pessoa.idade);
			printf("Altura do Paciente: \t%.2f\n", pessoa.altura);
			printf("Peso do Paciente: \t%.2f\n", pessoa.peso);
			printf("IMC do Paciente: \t%.2f\n", pessoa.imc);
			printf("----------------------------------\n");
			i++;
		}
	}
	
	printf("Total de Pacientes entre 20 e 50 anos: %d\n", i);
	
	getch();
	system("cls");
	fclose(a);
}

void saudaveis(){
	FILE *a;
	a = fopen("arquivo.dat", "rb");
	struct paciente pessoa;
	int i=0;
	
	while((fread(&pessoa, sizeof(struct paciente), 1, a)) == 1){
		if(pessoa.imc>18.5 && pessoa.imc<=24.9){
			printf("Nome do Paciente: \t%s\n", pessoa.nome);
			printf("Idade do Paciente: \t%d\n", pessoa.idade);
			printf("Altura do Paciente: \t%.2f\n", pessoa.altura);
			printf("Peso do Paciente: \t%.2f\n", pessoa.peso);
			printf("IMC do Paciente: \t%.2f\n", pessoa.imc);
			printf("----------------------------------\n");
			i++;
		}
	}
	
	printf("Total de Pacientes entre Saudaveis: %d\n", i);
	
	getch();
	system("cls");
	fclose(a);
}

void menos50kg(){
	FILE *a, *b;
	a = fopen("arquivo.dat","rb");
	b = fopen("temp.dat", "wb");
    struct paciente pessoa;
	int encontrado;
	
	while (fread(&pessoa, sizeof(struct paciente), 1, a) == 1) {
        if (pessoa.peso>50) {
            fwrite(&pessoa, sizeof(struct paciente), 1, b);
            encontrado = 0;
        } else {
            encontrado = 1;
        }
    }
    
	fclose(a);
	fclose(b);
	
	remove("arquivo.dat");
    rename("temp.dat", "arquivo.dat");
    
	if (encontrado == 1) {
        printf("Registros excluidos com sucesso!\n");
    } else {
        printf("Nao Possui pacientes com menos de 50kg.\n");
    }
    
	getch();
	system("cls");
}

void sugestaopeso(){
	float altura, pesoidealA, pesoidealB;
	
	printf("Digite uma Altura:\n");
	scanf("%f", &altura);
	
	pesoidealA = 18.5*(altura*altura);
	pesoidealB = 24.9*(altura*altura);
	
	printf("O Peso Ideal esta entre %.2f e %.2f\n", pesoidealA, pesoidealB);
	getch();
	system("cls");
}

void sugestaoaltura(){
	float peso, alturaidealA, alturaidealB;
	
	printf("Digite um Peso:\n");
	scanf("%f", &peso);
	
	alturaidealA = sqrt(peso / 24.9);
	alturaidealB = sqrt(peso / 18.5);
	
	printf("A Altura Ideal esta entre %.2f e %.2f\n", alturaidealA, alturaidealB);
	getch();
	system("cls");
}

main(){
	int laco=0;
	while(laco==0){
		int opcao = menu();
	
		switch(opcao){
			case 1: inserir(); break;
			case 2: alterar(); break;
			case 3: excluir(); break;
			case 4: listar(); break;
			case 5: pesquisar(); break;
			case 6: excluirAll(); break;
			
			case 7: obesos(); break;
			case 8: altura(); break;
			case 9: idade(); break;
			case 10: saudaveis(); break;
			case 11: menos50kg(); break;
			case 12: sugestaopeso(); break;
			case 13: sugestaoaltura(); break;
			
			default: laco = 1;		
		}
	}
	
	printf("----------------------------------\n");
	printf("\tSistema Encerrado\n");
	printf("----------------------------------\n");
}