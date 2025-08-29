#include <stdio.h>

main(){
	FILE *a;
	a = fopen("arquivo.txt","r");
	char letra;
	int contador=0;
		
	if(a==NULL){
		printf("\nImpossivel abrir o arquivo!!!\n");
	}else{
		while((letra=fgetc(a)) != EOF){
			if((letra == 'a') || (letra == 'A') || (letra == 'e') || (letra == 'E') || (letra == 'i') || (letra == 'I')
			|| (letra == 'o') || (letra == 'O') || (letra == 'u') || (letra == 'U')){	
				contador++;		
			}
		}
		
		printf("O texto tem %d vogais", contador);
		fclose(a);
	}
}