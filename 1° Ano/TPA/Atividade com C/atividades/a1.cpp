#include <stdio.h>
#include <locale.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	
	float x[10]={0},soma=0;
	int contn=0,i;
	
	for(i=0; i<10; i++){
		printf("Digite o %i° número:\n", i+1);
		fflush(stdin);
		scanf("%f", &x[i]);
	}
	for(i=0; i<10; i++){
		if(x[i]<=0){
			contn++;
		}
		if(x[i]>0){
			soma+=x[i];
		}
	}
		printf("Quantidade de número negativos:%i\n",contn);
		printf("Soma dos números positivos:%.2f\n",soma);
}
