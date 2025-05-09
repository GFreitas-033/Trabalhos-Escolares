#include <stdio.h>
#include <conio.h>

main(){
	char texto1[50];
	char texto2[50];
	
	printf("String 1:\n");
	gets(texto1);
	
	
	printf("\nString 2:\n");
	gets(texto2);
	
	puts(texto1);
	puts(texto2);
	
	printf("\n A segunda letra da string 1: %c", texto1[1]);
	printf("\n A segunda letra da string 2: %c", texto2[1]);
}