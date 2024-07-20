#include <stdio.h>
#include <locale.h>
#include <stdlib.h>

int verificaes(int esco){
	printf("1-Comprar Passagem\n");
	printf("2-Mapa do Ônibus\n");
	printf("3-Encerrar\n");
	fflush(stdin);
	scanf("%i",&esco);

	if((esco!=1 && esco!=2 && esco!=3)){
		do{
			printf("Opição invalida! Tente de novo:\n");
			printf("1-Comprar Passagem\n");
			printf("2-Mapa do Ônibus\n");
			printf("3-Encerrar\n");
			fflush(stdin);
			scanf("%i",&esco);
		}while((esco!=1 && esco!=2 && esco!=3));
	}

	system("cls");

	switch(esco){
		case 1: return 1;break;
		case 2: return 2;break;
		default: return 3;break;
	}

}

int verificalado(int lado){
	printf("Escolha um lado:\n");
	printf("1-Janela\n");
	printf("2-Corredor\n");
	fflush(stdin);
	scanf("%i",&lado);

	if((lado!=1 && lado!=2)){
		do{
			printf("Opição invalida! Tente de novo:\n");
			printf("1-Janela\n");
			printf("2-Corredor\n");
			fflush(stdin);
			scanf("%i",&lado);
		}while((lado!=1 && lado!=2));
	}

	system("cls");

	switch(lado){
		case 1: return 1;break;
		default: return 2;break;
	}
}

void mostraronibus(int j[],int c[]){
    int i;

    printf("Janela:\n");
    for(i=0; i<24; i++){
        printf("%i|Posição %i\n",j[i],i+1);
    }
    system("pause");
    system("cls");
    printf("\nCorredor:\n");
    for(i=0; i<24; i++){
        printf("%i|Posição %i\n",c[i],i+1);
    }
    system("pause");
    system("cls");
}

int main(){
	setlocale(LC_ALL, "Portuguese");

	int janela[24]={0},corredor[24]={0},i,p=0,opicao=0,vl=0,vj=0,vc=0;

	while(opicao!=3){
		opicao=verificaes(opicao);
		if(opicao==1){
			vl=verificalado(vl);
			if(vl==1){
				printf("Qual posição você deseja comprar?\n");
				fflush(stdin);
				scanf("%i", &p);
				if(janela[p]==0){
					printf("Compra Efetivada!\n");
					janela[p-1]=1;
					p=0;
					system("pause");
					system("cls");
				}else{
					printf("Poltrona não disponível para venda!\n");
					system("pause");
					system("cls");
				}
			}else{
				printf("Qual posição você deseja comprar?\n");
				fflush(stdin);
				scanf("%i", &p);
				if(corredor[p]==0){
					printf("Compra Efetivada!\n");
					corredor[p-1]=1;
					p=0;
					system("pause");
					system("cls");
				}else{
					printf("Poltrona não disponível para venda!\n");
					system("pause");
					system("cls");
				}
			}
		}else if(opicao==2){
            mostraronibus(janela,corredor);
		}else{
			return 0;
		}
	}
}

