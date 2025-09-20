#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>

int contar(char *s, char c){
	if(*s == '\0'){
        return 0;
    }
//	Comentado para contar " " tb
//   	if(*s == ' '){
//    	return contar(s+1, c);
//	}
	if(*s == c){
		return 1 + contar(s+1, c);
	}else{
		return contar(s+1, c);
	}
}

main(){
	char s[255];
	char c;
	int cont;
	
	printf("Digite uma String:\n");
	fflush(stdin);
	gets(s);
	
	printf("Digite um char para buscar:\n");
	fflush(stdin);
	scanf("%c", &c);
	
	cont = contar(s, c);
	
	printf("O caractere '%c' aparece %d vezes na string\n", c, cont);
	
	getch();
}