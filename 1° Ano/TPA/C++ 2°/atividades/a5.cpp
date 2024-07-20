#include <stdio.h>
#include <locale.h>

main(){
	setlocale(LC_ALL, "Portuguese");
	
	float x[10]={0},maior,menor;
	int i,pm,pmn;
	
	printf("Digite a 1° altura:\n");
	fflush(stdin);
	scanf("%f", &x[0]);
	maior=x[0];
	menor=x[0];
	
	for(i=1; i<10; i++){
		printf("Digite a %i° altura:\n", i+1);
		fflush(stdin);
		scanf("%f", &x[i]);
	}
	
	for(i=0; i<10; i++){
		if(x[i]>maior){
			maior=x[i];
			pm=i+1;
		}
	}
	for(i=0; i<10; i++){
		if(x[i]<menor){
			menor=x[i];
			pmn=i+1;
		}
	}

	
	printf("A maior altura é %.2f e pertence ao aluno %i\n",maior,pm);
	printf("A menor altura é %.2f e pertence ao aluno %i",menor,pmn);
}
