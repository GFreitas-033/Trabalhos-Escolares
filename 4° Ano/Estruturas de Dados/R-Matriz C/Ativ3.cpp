#include <stdio.h>
#include <conio.h>

main(){
	int matriz[4][4];
	int contador = 3;
	
	for(int i=0; i<4; i++){
		for(int j=0; j<4; j++){
			if(j==contador){
				matriz[i][j]=1;
			}else{
				matriz[i][j]=0;
			}
		}
		contador--;
	}
	for(int i=0; i<4; i++){
		for(int j=0; j<4; j++){
			printf("%d ",matriz[i][j]);
			if(j==3){
				printf("\n");
			}
		}
	}
}