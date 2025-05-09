#include <stdio.h>
#include <ctime>
#include <stdlib.h>

main(){
	int matriz[4][3];
	int valorI=0;
	srand(time(NULL));
	
	for(int i=0; i<4; i++){
		for(int j=0; j<3; j++){
			matriz[i][j] = rand()%21;
		}
	}
	
	printf("Digite um Numero de 1 a 20:\n");
	scanf("%d", &valorI);
	
	for(int i=0; i<4; i++){
		for(int j=0; j<3; j++){
			if(valorI==matriz[i][j]){
				matriz[i][j] = 0;
			}
			if(valorI>matriz[i][j]){
				matriz[i][j] = -1;
			}
			if(valorI<matriz[i][j]){
				matriz[i][j] = 1;
			}
		}
	}
	
	printf("\n");
	for(int i=0; i<4; i++){
		for(int j=0; j<3; j++){
			printf("%d   ", matriz[i][j]);
			if(j==2){
				printf("\n");
			}
		}
	}
}