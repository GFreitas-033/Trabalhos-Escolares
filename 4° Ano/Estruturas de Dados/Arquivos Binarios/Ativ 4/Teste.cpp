#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>

main(){
	FILE *nums, *par;
	nums = fopen("numeros.bin","rb");
	par = fopen("pares.bin","rb");
	int qtd=4;
	
	int numeros[qtd], pares[qtd];
		
	fread(&numeros, sizeof(int), qtd, nums);
	fread(&pares, sizeof(int), qtd, par);
	
	printf("Numeros:\n");
	for(int i=0; i<qtd; i++){
		printf("%d\n", numeros[i]);	
	}
	printf("Pares:\n");
	for(int i=0; i<qtd; i++){
		if(pares[i]!=0){
			printf("%d\n", pares[i]);
		}
	}
	
	fclose(nums);
	fclose(par);
}