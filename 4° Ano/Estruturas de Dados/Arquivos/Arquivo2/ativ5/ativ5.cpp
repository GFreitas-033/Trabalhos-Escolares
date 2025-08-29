#include <stdio.h>

main(){
	FILE *a, *b;
	a = fopen("index.html", "r");
	b = fopen("arquivo.txt", "w");
	int dentro=0;
	char letra;
	
	if(a==NULL && b==NULL){
		printf("\nImpossivel abrir o arquivo!!!\n");
	}else{
		while((letra=fgetc(a)) != EOF){
			if(letra=='<'){
				dentro=1;
			}else if(letra=='>'){
				dentro=0;
			}else if(!dentro){
				printf("%c", letra);
				fputc(letra,b);
			}
		}
	}
	
	fclose(a);
	fclose(b);
}