#include <stdio.h>
#include <string.h>

main(){
	FILE *a;
	a = fopen("arquivo.txt","r");
	char palavra[20], letra;
	int i=0,contador=0;
		
	if(a==NULL){
		printf("\nImpossivel abrir o arquivo!!!\n");
	}else{
		printf("Escreva uma palavra:\n");
		scanf("%s", &palavra);
		
		while((letra=fgetc(a)) != EOF){
			if(letra == palavra[i]){
				i++;			
				if(i==strlen(palavra)){
					contador++;
				}
			}else{
				i=0;
			}	

		}
		
		printf("A palavra apareceu no texto %d vezes", contador);
		fclose(a);
	}
}
