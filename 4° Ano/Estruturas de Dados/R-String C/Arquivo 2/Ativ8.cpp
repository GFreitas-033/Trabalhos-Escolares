#include <stdio.h>
#include <conio.h>

main(){
	char nomes[5][10];
	int idade[5];
	int i=0,maisJovem = 0, maisVelho = 0;
	
	
	for(i; i<5; i++){
		printf("Nome %d:\n", (i+1));
		scanf("%s", nomes[i]);

		printf("Idade:\n");
		scanf("%d", &idade[i]);
		
		if(idade[i] < idade[maisJovem]) {
			maisJovem = i;
		}
		if(idade[i] > idade[maisVelho]) {
			maisVelho = i;
		}
	}
	
	printf("\nPessoa mais jovem: %s, %d anos\n", nomes[maisJovem], idade[maisJovem]);
	printf("Pessoa mais velha: %s, %d anos\n", nomes[maisVelho], idade[maisVelho]);
}