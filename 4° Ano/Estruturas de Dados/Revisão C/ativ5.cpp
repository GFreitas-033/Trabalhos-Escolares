#include <stdio.h>

int verificar(int num){
	if(num%2 == 0){
		return 1;
	}else{
		return 0;
	}
}

main(){
	int num;
	int impar[10];
	int par[10];
	
	for(int i=0; i<10; i++){
		printf("\nDigite o %d numero: ", i+1);
		scanf("%d", &num);
		
		if(verificar(num) == 1){
			par[i] = num;
			impar[i] = 0;
		}else if(verificar(num) == 0){
			impar[i] = num;
			par[i] = 0;
		}
	}
	
	printf("\nNumeros Impar: ");
	for(int i=0; i<10; i++){
		if(impar[i]!=0){
			printf("\n%d", impar[i]);	
		}
	}
	
	printf("\nNumeros Pares: ");
	for(int i=0; i<10; i++){
		if(par[i]!=0){
			printf("\n%d", par[i]);	
		}
	}
}