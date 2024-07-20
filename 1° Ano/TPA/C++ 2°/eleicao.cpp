#include <stdio.h>
#include <locale.h>
#include <conio.h>
#include <stdlib.h>

main(){
	int v,vg,vs,ve,vf,vj,vn,i;
	
	setlocale(LC_ALL, "Portuguese");
	vg=0;
	vj=0;
	for(v=1; v<21;v++){
		printf("Vote em um candidato:\n");
		printf("1-Guilherme\n2-Saulo\n3-Eduardo\n4-Felipe\n5-Jean\n6-VOTO NULO\n");
		fflush(stdin);
		scanf("%i", &i);
		
		if((i!=1 && i!=2 && i!=3 && i!=4 && i!=5 && i!=6))
			do{
				printf("Digite um valor valido!!!\n");
				fflush(stdin);
				scanf("%i", &i);
			}while((i!=1 && i!=2 && i!=3 && i!=4 && i!=5 && i!=6));
		
		switch(i){
			case 1: vg++;break;
			case 2: vs++;break;
			case 3: ve++;break;
			case 4: vf++;break;
			case 5: vj++;break;
			default: vn++;break;
			}
		system("cls");
		}
		
		printf("\nCandidato Guilherme teve: %d votos\n",vg);
		printf("Candidato Saulo teve: %d votos\n",vs);
		printf("Candidato Eduardo teve: %d votos\n",ve);
		printf("Candidato Felipe teve: %d votos\n",vf);
		printf("Candidato Jean teve: %d votos\n",vj);
		printf("Votos nulos: %d\n",vn);
}
