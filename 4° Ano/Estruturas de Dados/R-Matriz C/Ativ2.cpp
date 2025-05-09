#include <stdio.h>
#include <conio.h>

main(){
	int matriz[6][6];
	int contador = 5;
	
	for(int i=0; i<6; i++){
		for(int j=0; j<6; j++){
			if(i==j){
				matriz[i][j]=1;
			}else if(j==contador){
				matriz[i][j]=2;
			}else{
				matriz[i][j]=3;
			}
		}
		contador--;
	}
	for(int i=0; i<6; i++){
		for(int j=0; j<6; j++){
			printf("%d ",matriz[i][j]);
			if(j==5){
				printf("\n");
			}
		}
	}
}