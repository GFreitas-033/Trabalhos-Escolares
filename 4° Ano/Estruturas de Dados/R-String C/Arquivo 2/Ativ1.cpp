#include <stdio.h>
#include <conio.h>

main(){
	char texto[50];
	int i=0,j=0;
	
	printf("String:\n");
	gets(texto);
	
	for(i; i<50; i++){
		if(texto[i] != '\0'){
			j++;
		}else{
			i=50;
		}
	}
	printf("Comprimento da String %d\n", j);
}