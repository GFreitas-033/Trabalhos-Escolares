#include <stdio.h>
#include <conio.h>

main(){
	int matriz1[3][3], matriz2[3][3];
	
	printf("Preencha a Matriz 1: \n");
	for(int i=0; i<3; i++){
		for(int j=0; j<3; j++){
			scanf("%d", &matriz1[i][j]);
		}
	}
	
	printf("Preencha a Matriz 2: \n");
	for(int i=0; i<3; i++){
		for(int j=0; j<3; j++){
			scanf("%d", &matriz2[i][j]);
		}
	}
	
	for(int i=0; i<3; i++){
		for(int j=0; j<3; j++){
			printf("%d ",(matriz1[i][j]+matriz2[i][j]));
			if(j==2){
				printf("\n");
			}
		}
	}
}