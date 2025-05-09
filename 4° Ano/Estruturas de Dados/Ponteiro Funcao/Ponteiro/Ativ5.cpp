#include <stdio.h>

main(){
	float matriz[3][3];
	
	for(int i=0; i<3; i++){
		for(int j=0; j<3; j++){
			printf("Endereco da Linha %d e Coluna %d: %d\n", (i+1),(j+1),&matriz[i][j]);	
		}
	}
}