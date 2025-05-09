#include <stdio.h>
#include <ctime>
#include <stdlib.h>

main(){
	int matriz[3][3];
	int valorI=0, tf=0, qtdMaior=0;
	srand(time(NULL));
	
	for(int i=0; i<3; i++){
		for(int j=0; j<3; j++){
			matriz[i][j] = rand()%21;
		}
	}
	
	printf("Digite um Numero de 1 a 20:\n");
	scanf("%d", &valorI);
	
	for(int i=0; i<3; i++){
		for(int j=0; j<3; j++){
			if(valorI==matriz[i][j]){
				printf("\nVoce Acertou o Numero\n");
				printf("Linha: %d Coluna: %d\n", (i+1),(j+1));
				tf=1;
			}
			if(valorI<matriz[i][j]){
				qtdMaior++;
			}
		}
	}
	if(tf==0){
		printf("\nVoce Errou o Numero\n");
	}
	
	printf("\nQuantidade de Numeros Maiores que o Numero Informado: %d\n", qtdMaior);
	
	printf("\n");
	for(int i=0; i<3; i++){
		for(int j=0; j<3; j++){
			printf("%d   ", matriz[i][j]);
			if(j==2){
				printf("\n");
			}
		}
	}
}