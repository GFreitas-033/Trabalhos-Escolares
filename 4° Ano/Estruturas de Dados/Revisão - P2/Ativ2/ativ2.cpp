#include <stdio.h>

int testaPrimo(int t){
	for(int j=2; j<t; j++){
		if(t % j == 0){
			return 0;
		}
	}
	if(t < 2){
		return 0;
	}
	return 1;
}

main(){
	FILE *p;
	p = fopen("primos.txt","w");
	
	if(p==NULL){
		printf("\nImpossivel abrir o arquivo!!!\n");
	}else{
		for(int i=1; i<1001; i++){
			if(testaPrimo(i) == 1){
				printf("%d\n",i);
				fprintf(p,"%d\n",i);
			}
		}
	}
	fclose(p);
}