#include <stdio.h>
#include <conio.h>

main(){
	char texto[10];
	int i=0;
	
	printf("Strind:\n");
	gets(texto);

	for(i; i<10; i++){
		if(texto[i] != 'a' && texto[i] != 'A' && texto[i] != 'e' && texto[i] != 'E' && texto[i] != 'i' 
			&& texto[i] != 'I' && texto[i] != 'o' && texto[i] != 'O' && texto[i] != 'u' && texto[i] != 'U'){
			printf("%c", texto[i]);
		}
	}
}