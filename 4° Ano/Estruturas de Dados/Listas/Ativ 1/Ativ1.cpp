#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>

struct No {
	int valor;
	struct No *prox;
};
typedef struct No lista;

void inicializa (lista *listaOr){
	listaOr->prox = NULL;
	printf("Lista inicializada\n");
}

int checa_lista(lista *listaOr){
	if(listaOr->prox == NULL){
		return 1;	
	}else{
		return 0;	
	}
}

void mostra_lista(lista *listaOr){
	if(checa_lista(listaOr)){
		printf("Lista vazia\n");
		return ;
	}
	lista *aux = listaOr->prox;
	printf("Lista -> ");
	while( aux != NULL){
		printf("%d -> ", aux->valor);
		aux = aux->prox;
	}
	printf("NULL \n\n");
}

void adiciona_fim(lista *listaOr){ 
	lista *novo = (lista *) malloc(sizeof(lista));
	if(!novo){ 
		printf("Impossivel alocar memoria\n");
		exit(1);
	}
	printf("Digite um valor para inserir na lista:\n");
	scanf("%d", &novo->valor);
	novo->prox = NULL;
	if(checa_lista(listaOr)){
		listaOr->prox = novo;
	}else{
		lista *aux = listaOr->prox;
		while(aux->prox != NULL){
			aux = aux->prox;
		}
		aux->prox = novo;
	}
}

int tamanho_lista (lista *cartas){
	int i = 0;
	while (cartas->prox != NULL){
		cartas = cartas->prox;
		i++;
	}
	return i;
}

void adiciona_na_ordem(lista *listaOr){
	lista *novo = (lista *) malloc(sizeof(lista));
	if(!novo){
		printf("Impossivel alocar memoria\n");
		exit(1);
	}
	printf("Digite um valor para inserir na lista:\n");
    scanf("%d", &novo->valor);
    novo->prox = NULL;
    
    lista *ant = listaOr;
    lista *atual = listaOr->prox;

    while(atual != NULL && atual->valor < novo->valor){
        ant = atual;
        atual = atual->prox;
    }

	ant->prox = novo;
    novo->prox = atual;

    printf("Elemento %d inserido em ordem!\n", novo->valor);
}

main(){
	lista *listaOr = (lista *) malloc(sizeof(lista));
	if(!listaOr){
		printf("Impossivel alocar memoria\n");
		exit(1);
	} else{
		printf("Bem Vindo!!!\n");
		inicializa(listaOr);
		
		adiciona_fim(listaOr);
		adiciona_fim(listaOr);
		adiciona_fim(listaOr);
		
		mostra_lista(listaOr);
		
		adiciona_na_ordem(listaOr);
		
		mostra_lista(listaOr);
		
		free(listaOr);
	}
}