#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>

main(){
	int *v;
	int i,j;
	char resp;
	
	printf("\nDigite o tamanho do vetor: ");	
	scanf("%d", &i);
	v = (int *) calloc(i, sizeof(int));
	
	if( v == NULL ){
		printf("\nErro para alocacao de memoria");
	} else {
		for( j=0;j<i;j++) {
			printf("Digite os numeros do vetor: ");
			scanf("%d", &v[j]); 
		}
		printf("Os numeros digitados foram: ");	
		for( j=0;j<i;j++){
			printf("%d ", v[j]);		
		}

		i = 0;
		j = 0;
	
		printf("\nAumentar o tamanho: S/N\n");
		fflush(stdin);
		scanf("%c", &resp);
	
		if(resp == 's'){
			printf("\nQual o novo tamanho do Vetor: ");
			scanf("%d", &i);
			v = (int *) (realloc(v, (i) * sizeof(int)));
			for( j=0;j<i;j++) {
				printf("Digite os numeros do vetor: ");
				scanf("%d", &v[j]); 
			}
			printf("Os numeros digitados foram: ");
			for( j=0;j<i;j++){
				printf("%d ", v[j]);
			}
			free(v);	
		}else if(resp == 'n'){
			printf("\nOK entao!!!");
		}
	}
	getch();
}