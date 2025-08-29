#include <stdio.h>

main(){
	FILE *a;
	a = fopen("arquivo.txt", "r");
	int coluna=0, linha=1;
	char texto;
	
	if(a==NULL){
		printf("\nImpossivel abrir o arquivo!!!\n");
	}else{
		while((texto=fgetc(a)) != EOF){
			if(texto!='\n'){
				putchar(texto);
				coluna++;
			}
			if(texto=='\n'){
				linha++;
				putchar('\n');
			}
		}
	}
	if(coluna==0){
		linha=0;
	}else{
		coluna = coluna/linha;	
	}
	
	printf("\n\nA dimensao da Matriz e: %d x %d", coluna, linha);
	fclose(a);
}