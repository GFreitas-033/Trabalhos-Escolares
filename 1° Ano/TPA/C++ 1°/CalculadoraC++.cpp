#include <stdio.h>
#include <locale.h>
#include <conio.h>

char converte (char c)
{
	char f=c;
	if((f!='+') && (f!='-') && (f!='*') && (f!='/')){
		do{
			printf("Operação invalida! Digite uma certa: + - * /");
			fflush(stdin);
			scanf("%c", &f);
		}while((f!='+') && (f!='-') && (f!='*') && (f!='/'));
	}
	return f;
}
main(){
	float n1,n2,n3;
	char op,v,fecha;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite o número:\n");
	fflush(stdin);
	scanf("%f", &n1);
	printf("Digite uma operação + - * /:\n");
	fflush(stdin);
	scanf("%c", &op);
	v = converte(op);
	n3 = n1;
	do{
		printf("Digite o número:\n");
		fflush(stdin);
		scanf("%f", &n2);
		switch(v){
			case '+': n3+=n2;break;
			case '-': n3-=n2;break;
			case '*': n3*=n2;break;
			case '/': n3/=n2;break;
		}	
		printf("\nResultado: %6.2f",n3);
		printf("\nDigite uma operação + - * / ou Digite = para obter o resultado final:\n");
		fflush(stdin);
		scanf("%c", &fecha);
		if(fecha!='=')
			v = converte(fecha);
	}while(fecha != '=');
	printf("Resultado final:%6.2f",n3);
}
