#include <stdio.h>
#include <conio.h>
#include <string.h>

main(){
	char principal[50], secundaria[50];
	
	printf("String de 50 letras:\n");
	gets(principal);
	
	strcpy(secundaria,principal);
	
	printf("String Primaria: ");
	puts(principal);
	printf("\nString Secundaria: ");
	puts(secundaria);
}