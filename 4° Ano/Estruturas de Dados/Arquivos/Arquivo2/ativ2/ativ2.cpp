#include <stdio.h>

main(){
	FILE *a;
	a = fopen("temp.txt","r");
	float vetor[50];
	float menor, maior, media;
	int qtdMenor=0, qtdMaior=0;
		
	if(a==NULL){
		printf("\nImpossivel abrir o arquivo!!!\n");
	}else{		
		for(int i=0; i<50; i++){
			fscanf(a,"%f",&vetor[i]);
			printf("%2.1f\n", vetor[i]);
		}
		menor = vetor[0];
		maior = vetor[0];
		for(int i=0; i<50; i++){
			if(vetor[i]<=menor){
				menor = vetor[i];
			}
			if(vetor[i]>=maior){
				maior = vetor[i];
			}
			media += vetor[i];
		}
		
		media = media/50;
		
		for(int i=0; i<50; i++){
			if(vetor[i]<media){
				qtdMenor++;
			}
			if(vetor[i]>media){
				qtdMaior++;
			}
		}
		printf("A menor temperatura ocorrida: %2.1f\n", menor);
		printf("A maior temperatura ocorrida: %2.1f\n", maior);
		printf("A temperatura media: %2.1f\n", media);
		printf("Temperatura inferior a temperatura media: %d\n", qtdMenor);
		printf("Temperatura superior a temperatura media: %d\n", qtdMaior);
	}
	
	fclose(a);
}