#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>

main(){
	FILE *nums, *par;
	nums = fopen("numeros.bin","wb");
	par = fopen("pares.bin","wb");
	int qtd=0;
	
	printf("Quantos Numeros vai ser: \n");
	scanf("%d", &qtd);
	int numeros[qtd], pares[qtd];
	
	for(int i=0; i<qtd; i++){
		printf("Digite o %d Numero:\n", (i+1));
		scanf("%d", &numeros[i]);
		if(numeros[i] % 2 == 0){
			pares[i] = numeros[i];
		}else{
			pares[i] = 0;
		}
	}
	
	fwrite(&numeros, sizeof(int), qtd, nums);
	fwrite(&pares, sizeof(int), qtd, par);	
	
	fclose(nums);
	fclose(par);
}