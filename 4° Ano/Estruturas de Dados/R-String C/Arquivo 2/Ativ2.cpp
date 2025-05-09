#include <stdio.h>
#include <conio.h>

main(){
	char nome[20];
	
	printf("Nome:\n");
	gets(nome);
	
	if(nome[0] == 'a' || nome[0] == 'A'){
		puts(nome);
	}
}