#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>

void preencher(int **matriz, int linhas, int colunas) {
    printf("Digite os numeros da matriz:\n");
    for(int i=0; i < linhas; i++){
        for(int j=0; j < colunas; j++) {
            scanf("%d", &matriz[i][j]);
        }
    }
}

int pesquisar(int valor ,int **matriz, int linhas, int colunas){
	for(int i=0; i < linhas; i++){
        for(int j=0; j < colunas; j++) {
            if(valor==matriz[i][j]){
            	return 1;
			}
        }
    }
    return 0;
}

main(){
	int **m;
	int l,c, v;
	
	printf("Digite o tanto de linhas:\n");	
	scanf("%d", &l);
	printf("Digite o tanto de colunas:\n");	
	scanf("%d", &c);
	
	m = (int **) malloc(l * sizeof(int *));
	
	if(m == NULL){
		printf("\nErro para alocacao de memoria");
	}else{
		for(int i=0; i<l; i++){
			m[i] = (int *) malloc(c * sizeof(int));
        	if(m[i] == NULL) {
            	printf("\nErro para alocacao de memoria");
        	}
		}
	}
	
	preencher(m, l, c);
	
	printf("Os numeros digitados foram:\n");
    for(int i=0; i < l; i++){
        for(int j=0; j < c; j++) {
        	printf("%d ", m[i][j]);
        }
		printf("\n");
    }
    
    printf("Digite um valor para buscar na matriz:\n");
    scanf("%d", &v);
    
    if(pesquisar(v, m, l, c)==1){
        printf("O valor %d esta na matriz\n", v);
    } else {
        printf("O valor %d nao esta na matriz\n", v);
    }
    
    for(int i=0; i < l; i++) {
    	free(m[i]);
    }
    free(m);
	getch();
}