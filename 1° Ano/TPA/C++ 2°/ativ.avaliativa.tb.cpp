#include <stdio.h>
#include <locale.h>
#include <stdlib.h>

int verificaes(int esco){
		printf("1-Efetuar Depósito\n");
		printf("2-Efetuar Saque\n");
		printf("3-Consultar o Ativo Bancário\n");
		printf("4-Encerrar\n");
		fflush(stdin);
		scanf("%i",&esco);
		
	if((esco!=1 && esco!=2 && esco!=3 && esco!=4)){
		do{
			printf("Opição invalida! Tente de novo:\n");
			printf("1-Efetuar Depósito\n");
			printf("2-Efetuar Saque\n");
			printf("3-Consultar o Ativo Bancário\n");
			printf("4-Encerrar\n");
			fflush(stdin);
			scanf("%i",&esco);
			system("cls");
		}while((esco!=1 && esco!=2 && esco!=3 && esco!=4));
	}

	system("cls");

	switch(esco){
		case 1: return 1;break;
		case 2: return 2;break;
		case 3: return 3;break;
		default: return 4;break;
	}
}

int verifica (int v[],int t, int valor){
	for(int j = 0; j< t ; j++)
		if (v[j]==valor)
			return 1;
	return 0;		
}

int verificac(int cc,int c[]){	
	for(int j=0; j<10; j++)
		if (cc==c[j]){
			return j;
		}	
	system("cls");
	return -1;
}

int main(){
	setlocale(LC_ALL, "Portuguese");

	int conta[10]={0},i,opcao=0,cdc=0;
	float saldo[10]={0},q=0,cab=0;
	
	for(i=0; i<10; i++){
		printf("Cadastrar Contas:\n");
		printf("\nDigite o código da conta:\n");
		fflush(stdin);
		scanf("%i", &conta[i]);
		
		if(verifica(conta,i,conta[i]))
			do{ 
				printf("\nDigite um valor Diferente para a conta:");
				scanf("%i",&conta[i]);
			}while(verifica(conta,i,conta[i]));	
		
		printf("\nDigite o saldo da conta:\n");
		fflush(stdin);
		scanf("%f", &saldo[i]);
		if(saldo[i]<0){
			do{
				printf("Digite um saldo positivo para conta!\n");
				fflush(stdin);
				scanf("%f", &saldo[i]);
			}while(saldo[i]<0);
		}
		system("cls");
	}
	
	while(opcao!=4){
		opcao=verificaes(opcao);
		if(opcao==1){
			printf("Qual o código da conta?\n");
			fflush(stdin);
			scanf("%i", &cdc);
			cdc=verificac(cdc,conta);
			
			if(cdc==-1){
				printf("Conta não encontrada\n");
				system("pause");
				system("cls");
			}else{
				printf("Quanto vai ser depósitado?\n");
				fflush(stdin);
				scanf("%f", &q);
				if(q<0){
					do{
						printf("O depósito precisa ser maior do que 0!\n");
						fflush(stdin);
						scanf("%f", &q);
					}while(q<0);
				}
				system("cls");
				saldo[cdc]+=q;
			}
		}else if(opcao==2){
			printf("Qual o código da conta?\n");
			fflush(stdin);
			scanf("%i", &cdc);
			cdc=verificac(cdc,conta);
			
			if(cdc==-1){
				printf("Conta não encontrada\n");
				system("pause");
				system("cls");
			}else{
				printf("Quanto vai ser o saque?\n");
				fflush(stdin);
				scanf("%f", &q);
				
				if(q>saldo[cdc]){
					printf("Saldo insuficiente\n");
					system("pause");
				}else{
					saldo[cdc]-=q;
				}
				system("cls");
			}
		}else if(opcao==3){
			for(i=0; i<10; i++){
				cab+=saldo[i];
			}
			printf("Ativo Bancário: R$%.2f\n", cab);
			system("pause");	
			system("cls");
			cab=0;
		}else{
			return 0;
		}
	}
}
