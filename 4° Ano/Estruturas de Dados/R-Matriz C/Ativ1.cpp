#include <stdio.h>
#include <conio.h>

main(){
	int matriz[6][6];
	
	for(int i=0; i<6; i++){
		for(int j=0; j<6; j++){
			if(i==0 || i==5 || j==0 || j==5){
				matriz[i][j]=1;
			}else if(i==1 || i==4 || j==1 || j==4){
				matriz[i][j]=2;
			}else if(i==2 || i==3 || j==2 || j==3){
				matriz[i][j]=3;
			}else{
				matriz[i][j]=0;
			}
		}
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