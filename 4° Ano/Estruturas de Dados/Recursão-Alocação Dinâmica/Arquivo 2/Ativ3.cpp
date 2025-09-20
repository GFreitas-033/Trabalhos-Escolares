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

void maiores(int **matriz, int linhas, int colunas, int *maior, int *lin, int *col) {
    maior[0] = matriz[0][0];
	lin[0] = 0;
	col[0] = 0;
	
    maior[1] = matriz[0][0];
	lin[1] = 0;
	col[1] = 0;
    
	maior[2] = matriz[0][0];
	lin[2] = 0;
	col[2] = 0;

    for(int i = 0; i < linhas; i++) {
        for(int j = 0; j < colunas; j++) {
            if(matriz[i][j] > maior[0]) {
                maior[2] = maior[1]; 
				lin[2] = lin[1]; 
				col[2] = col[1];
				
                maior[1] = maior[0]; 
				lin[1] = lin[0]; 
				col[1] = col[0];

                maior[0] = matriz[i][j]; 
				lin[0] = i; 
				col[0] = j;
            } else if(matriz[i][j] > maior[1]) {
                maior[2] = maior[1]; 
				lin[2] = lin[1]; 
				col[2] = col[1];

                maior[1] = matriz[i][j]; 
				lin[1] = i; 
				col[1] = j;
            } else if(matriz[i][j] > maior[2]) {
                maior[2] = matriz[i][j]; 
				lin[2] = i; 
				col[2] = j;
            }
        }
    }
}

main(){
	int **x;
	int n,m;
	int maior[3], lin[3], col[3];
	
	printf("Digite o tanto de linhas:\n");	
	scanf("%d", &n);
	printf("Digite o tanto de colunas:\n");	
	scanf("%d", &m);
	
	x = (int **) malloc(n * sizeof(int *));
	
	if(x == NULL){
		printf("\nErro para alocacao de memoria");
	}else{
		for(int i=0; i<n; i++){
			x[i] = (int *) malloc(m * sizeof(int));
        	if(x[i] == NULL) {
				printf("\nErro para alocacao de memoria");
			}
		}
	}
	
	preencher(x, n, m);
	
	printf("Os numeros digitados foram:\n");
    for(int i=0; i < n; i++){
        for(int j=0; j < m; j++) {
        	printf("%d ", x[i][j]);
        }
		printf("\n");
    }
    
    maiores(x, n, m, maior, lin, col);

    printf("Os tres maiores numeros da matriz:\n");
    for(int i = 0; i < 3; i++) {
        printf("%d-maior: %d\tlinha:%d|coluna:%d\n", (i+1), maior[i], (lin[i]+1), (col[i]+1));
    }
    
    for(int i=0; i < n; i++) {
    	free(x[i]);
    }
    free(x);
	getch();
}