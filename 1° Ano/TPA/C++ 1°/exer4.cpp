#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	int n1,n2,n3,ma,me;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite 3 números:\n");	
	fflush(stdin);
	scanf("%i %i %i", &n1,&n2,&n3);
	
	if(n1 >= n2)
		if(n1 >= n3)
			ma = n1;
		else
			ma = n3;
	else
		if (n2 >= n3)
			ma = n2;
		else
			ma = n3;

	if(n1 <= n2)
		if(n1 <= n3)
			me = n1;
		else
			me = n3;
	else
		if(n2 <= n3)
			me = n2;
		else
			me = n3;
	printf("O maior número é: %i e o menor número é: %i\n",ma,me);
}
