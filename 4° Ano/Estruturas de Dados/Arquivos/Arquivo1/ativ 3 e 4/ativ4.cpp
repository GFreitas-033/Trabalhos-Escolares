#include <stdio.h>
#include <string.h>

main(){
	FILE *a;
	a = fopen("arquivo.txt","r");
	char caracter,letra;
	int i=0;
		
	if(a==NULL){
		printf("\nImpossivel abrir o arquivo!!!\n");
	}else{
		printf("Escreva uma letra:\n");
		scanf("%c", &caracter);
		
		while((letra=fgetc(a)) != EOF){
			if(letra == caracter){
				i++;			
			}	
		}
	
		printf("A letra apareceu no texto %d vezes", i);
		fclose(a);
	}
	
}
