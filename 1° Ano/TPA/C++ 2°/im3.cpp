#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int n1;
	
	setlocale(LC_ALL, "Portuguese");
	for(n1=1; n1<501; n1++){
		if(n1%3==0 && n1%2!=0)
			printf("%i\n",n1);
	}
}
