#include <stdio.h>
#include <locale.h>
#include <conio.h>

main(){
	char nome[20];
	float p,a,imc;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite seu nome, seu peso(em kg) e sua altura(em metros):\n");
	fflush(stdin);
		scanf("%s %f %f", &nome,&p,&a);
	imc = p/(a*a);
	printf("%s seu peso �:%4.2f kg e sua altura �:%2.2f metros ent�o seu IMC �:%6.2f\nClassifica��o Final: ",nome,p,a,imc);
	
	if(imc<18.5)
		printf("Magreza");
	else
		if(imc<25)
		printf("Normal");
		else
			if(imc<30)
				printf("Sobrepeso");
			else
				if(imc<40)
					printf("Obsidade");
				else
					printf("Obsidade Grave");
}
