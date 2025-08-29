#include <stdio.h>

main(){
	FILE *p, *im;
	p = fopen("par.txt","w");
	im = fopen("impar.txt","w");
	int vetor1[5], vetor2[5];
	int num, qtd1=0, qtd2=0;
	
	if(p==NULL || im==NULL){
		printf("\nImpossivel abrir o arquivo!!!\n");
	}else{
		for(int i=0; i<30; i++){
			printf("Digite o %d numero:\n", (i+1));
			scanf("%d", &num);
			
			if(num%2==0){
				if(qtd1<5){
					vetor1[qtd1]=num;
					qtd1++;	
				}else{
					printf("\nVetor Par Cheio\n\n");
				}
			}else{
				if(qtd2<5){
					vetor2[qtd2]=num;
					qtd2++;	
				}else{
					printf("\nVetor Impar Cheio\n\n");
				}
			}
			
			if(qtd1>=5 && qtd2>=5){
				i=30;
			}
		}
		
		printf("\n");
		for(int i=0; i<5; i++){
			printf("%d \t %d \n", vetor1[i], vetor2[i]);
			fprintf(p,"%d\n", vetor1[i]);
			fprintf(im,"%d\n", vetor2[i]);
		}
	}
	fclose(p);
	fclose(im);
}