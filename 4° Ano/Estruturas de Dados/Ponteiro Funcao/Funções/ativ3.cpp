#include <stdio.h>
#include <stdlib.h>

void menu(int *esc){
	int x;
	printf("---------------------------------------\n");
	printf("Menu de Escolhas de Operacoes\n\n");
	printf("1 - Adicao         +\n");
	printf("2 - Subtracao      -\n");
	printf("3 - Multiplicacao  *\n");
	printf("4 - Divisao        /\n");
	printf("---------------------------------------\n");
	scanf("%d", &x);
	*esc = x;
	system("CLS");
}

void calcular(int *esc, float *n1,float *n2){
	if(*esc==1){
		printf("%4.2f + %4.2f = %4.2f", *n1, *n2, ((*n1)+(*n2)));
	}else if(*esc==2){
		printf("%4.2f - %4.2f = %4.2f", *n1, *n2, ((*n1)-(*n2)));
	}else if(*esc==3){
		printf("%4.2f * %4.2f = %4.2f", *n1, *n2, ((*n1)*(*n2)));
	}else if(*esc==4){
		if((*n1)==0 || (*n2)==0){
			printf("Impossivel Dividir por 0");
		}else{
			printf("%4.2f / %4.2f = %4.2f", *n1, *n2, ((*n1)/(*n2)));
		}
	}
}

main(){
	int escolha;
	float num1, num2;
	
	printf("Digite o primeiro Numero:\n");
	scanf("%f", &num1);
	printf("Digite o segundo Numero:\n");
	scanf("%f", &num2);
	menu(&escolha);
	if(escolha!=1 && escolha!=2 && escolha!=3 && escolha!=4){
		do{
			printf("\nEscolha uma opcao VALIDA!!!\n");
			menu(&escolha);
		}while(escolha!=1 && escolha!=2 && escolha!=3 && escolha!=4);
	}
	calcular(&escolha,&num1,&num2);
}