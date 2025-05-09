#include <stdio.h>
#include <conio.h>

main(){
	char texto[5];
	
	printf("String de 5 letras:\n");
	gets(texto);
	
	printf("\nString Invertida:\n\n");
	for(int i=4; i>-1; i--){
		printf("%c", texto[i]);
	}
}