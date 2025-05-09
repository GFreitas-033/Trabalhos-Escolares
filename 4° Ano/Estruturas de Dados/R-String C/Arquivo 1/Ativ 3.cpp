#include <stdio.h>
#include <conio.h>
#include <string.h>

main(){
	char principal[5], secundaria[5];
	char x;
	
	printf("String de 4 letras:\n");
	gets(principal);	
	
	strcpy(secundaria,principal);
	
	x = secundaria[0];
	secundaria[0] = secundaria[3];
	secundaria[3] = x;                  

	printf("String Primaria: ");
	puts(principal);
	printf("\nString Secundaria: ");
	puts(secundaria);
}     
	
