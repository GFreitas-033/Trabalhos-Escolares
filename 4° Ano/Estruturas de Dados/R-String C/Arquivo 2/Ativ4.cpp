#include <stdio.h>
#include <conio.h>

main(){
	char texto[10];
	int i=0,j=0;
	
	printf("Strind:\n");
	gets(texto);

	for(i; i<10; i++){
		if(texto[i] == '1'){
			j++;
		}
	}
	
	printf(" = %d\n", j);
}