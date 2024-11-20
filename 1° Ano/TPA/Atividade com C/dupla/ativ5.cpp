#include <stdio.h>
#include <locale.h>
#include <conio.h>
#include <stdlib.h>

main(){
	int v,vn=0,i,j,aux=0,x[5]={0},can[5]={0},nome=0;
	
	setlocale(LC_ALL, "Portuguese");
	
	can[0]=1;
	can[1]=2;
	can[2]=3;
	can[3]=4;
	can[4]=5;
	
	for(v=0; v<20;v++){
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
			case 1: x[0]++;break;
			case 2: x[1]++;break;
			case 3: x[2]++;break;
			case 4: x[3]++;break;
			case 5: x[4]++;break;
			default: vn++;break;
			}
		system("cls");
		}
		
	for(i=0; i<5; i++){
		for(j=0; j<5; j++){
			if(x[i]>x[j]){
				aux=x[j];
				x[j]=x[i];
				x[i]=aux;
				nome=can[j];
				can[j]=can[i];
				can[i]=nome;
			}
		}
	}
	
	printf("Classificação:\n");
	for(i=0; i<5; i++){
		printf("O candidato %i teve %i votos\n",can[i],x[i]);
	}
	printf("Votos Nulos:%i\n",vn);
}
