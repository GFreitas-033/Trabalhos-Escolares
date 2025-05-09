#include <stdio.h>

main(){
	int n1,n2;
	
	printf("Digite um numero: ");
	scanf("%d", &n1);
	printf("\nDigite outro numero: ");
	scanf("%d", &n2);
	
	if(&n1 > &n2){
		printf("\nEndereco de n1 e maior que o n2");
		printf("\nEndereco de n1 %d  Endereco de  n2: %d", &n1, &n2);
	}else{
		printf("\nEndereco de n2 e maior que o n1");
		printf("\nEndereco de n1 %d  Endereco de  n2: %d", &n1, &n2);
	}
}