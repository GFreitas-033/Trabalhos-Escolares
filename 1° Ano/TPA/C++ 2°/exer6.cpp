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
	printf("%s seu peso é:%4.2f kg e sua altura é:%2.2f metros então seu IMC é:%6.2f\nClassificação Final: ",nome,p,a,imc);
	
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
