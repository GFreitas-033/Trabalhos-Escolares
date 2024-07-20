#include <stdio.h>
#include <locale.h>
#include <conio.h>



main(){
	float altura,maior,menor,media,r;
	int i;
	
	setlocale(LC_ALL, "Portuguese");
	printf("Digite a 1° altura:\n");
	fflush(stdin);
	scanf("%f",&altura);
	maior=altura;
	menor=altura;
	
	for(i=2; i<11; i++){
		printf("Digite a %i° altura:\n",i);
		fflush(stdin);
		scanf("%f",&altura);
		if(altura>maior)
			maior=altura;
			
		if(altura<menor)
			menor=altura;
		
		media+=altura;
	}		
	media/=10;
	printf("A maior altura é: %2.2f\n",maior);
	printf("A menor altura é: %2.2f\n",menor);
	printf("A media é: %2.2f\n",media);
}
