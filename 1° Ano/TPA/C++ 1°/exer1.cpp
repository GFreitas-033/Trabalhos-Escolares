#include <stdio.h>
#include <locale.h>
#include <conio.h>
main (){
float preco,paga,l;

setlocale(LC_ALL, "Portuguese");
	printf("Qual o preço da gasolina?\n");
	fflush(stdin);
scanf("%f", &preco);
	printf("Quanto você vai pagar?\n");
	fflush(stdin);
scanf("%f", &paga);
l = paga/preco;
	printf("Valor da gasolina: %4.2f, Você vai pagar: %4.2f, Litros: %4.2f\n",preco,paga,l);
}
