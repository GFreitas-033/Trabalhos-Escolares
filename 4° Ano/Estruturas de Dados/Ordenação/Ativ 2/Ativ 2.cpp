#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>

struct No {
	int valor;
	struct No *prox;
	struct No *ant;
};
typedef struct No lista;

int checa_lista(lista *list){
	if(list->prox == NULL){
		return 1;
	}else{
		return 0;
	}
}
// 5
int tamanho_lista (lista *list){
	int i = 0;
	while (list->prox != NULL){
		list = list->prox;
		i++;
	}
	return i;
}

// Menu de Opções
int menu(){
	int op;
	do{
		printf("----------------------------------\n");
		printf("\tMenu de Escolhas\n");
		printf("----------------------------------\n");
		printf("1 - Inserir Final\n");
		printf("2 - Mostrar Lista\n");
		printf("3 - Remover Final\n");
		printf("4 - Limpar Lista\n");
		printf("5 - Tamanho da Lista\n");
		printf("6 - Pesquisar Elemento\n");
		printf("----------------------------------\n");
		printf("\tFormas de Ordenar\n");
		printf("----------------------------------\n");
		printf("7 - Insercao\n");
		printf("8 - Selecao\n");
		printf("9 - Bubble\n");
		printf("10 - Shell\n");
		
		printf("0 - Sair\n");
		printf("----------------------------------\n");
		scanf("%d", &op);
		system("cls");
	} while (op<0 || op>10);
	return op;
}

// Adicionar 1
void adiciona_fim(lista *list, int valor){ 
	lista *novo = (lista *) malloc(sizeof(lista));
	if(!novo){ 
		printf("Impossivel alocar memoria\n");
		exit(1);
	}
	novo->valor = valor;
	novo->prox = NULL;
	if(checa_lista(list)){
		list->prox = novo;
		novo->ant = list;
	}else{ 
		lista *aux = list->prox;
		while(aux->prox != NULL){
			aux = aux->prox;
		}
		aux->prox = novo;
		novo->ant = aux;
	}
}

// Mostrar 2
void mostra_lista(lista *list){
	if(checa_lista(list)){
		printf("----------------------------------\n");
		printf("\tLista vazia\n");
		printf("----------------------------------\n");
		getch();
		system("cls");
		return ;
	}
	lista *aux = list->prox;
	printf("Lista -> ");
	while( aux != NULL){
		printf("%d -> ", aux->valor);
		aux = aux->prox;
	}
	printf("NULL \n\n");
	getch();
	system("cls");
}

// Remover 3
void remove_final (lista *list){
	if(checa_lista(list)){
		printf("----------------------------------\n");
		printf("\tA lista está vazia!\n");
		printf("----------------------------------\n");
		getch();
		system("cls");
		return;
	}
	
	while (list->prox->prox != NULL){
		list = list->prox;
	}
	free(list->prox);
	list->prox = NULL;
	
	printf("-------------------------------------------\n");
	printf("Removendo o ultimo elemento da Lista!\n");
	printf("-------------------------------------------\n");
	getch();
	system("cls");
}

// Limpar 4
void limpa_lista(lista *list){ 
	if(!checa_lista(list)){ 
		lista *aux,*atual,*head;
		head = list;
		atual = list->prox;
		while(atual->prox != NULL){
			aux = atual->prox;
			free(atual);
			atual = aux;
		}
		if(atual->prox == NULL){ 
			head->prox = NULL;
			free(atual);
		}
	}
	printf("----------------------------------\n");
	printf("\tLista Limpa\n");
	printf("----------------------------------\n");
	getch();
	system("cls");
}

// Funções de Ordenar
void ordenar_insercao(lista *list){
	if(checa_lista(list)){
		printf("----------------------------------\n");
		printf("\tLista vazia\n");
		printf("----------------------------------\n");
		getch();
		system("cls");
		return ;
	}
	
	int j,n,x;
	n = tamanho_lista(list);
	for (j = 1; j < n; j++){
		lista *atual = list->prox;
		for (int k = 0; k < j; k++){
			atual = atual->prox;
		}
		x = atual->valor;
		lista *anterior = atual->ant;
		while (anterior != NULL && x < anterior->valor){	
			anterior->prox->valor = anterior->valor;
            anterior = anterior->ant;
		}
		if (anterior != NULL){
			anterior->prox->valor = x;
		}else{
			list->prox->valor = x;
		}
	}

	printf("----------------------------------\n");
	printf("\tLista Ordenada - Insercao\n");
	printf("----------------------------------\n");
	getch();
	system("cls");
}

void ordenar_selecao(lista *list){
	if(checa_lista(list)){
		printf("----------------------------------\n");
		printf("\tLista vazia\n");
		printf("----------------------------------\n");
		getch();
		system("cls");
		return ;
	}
	
	int i, j, n, x;
	n = tamanho_lista(list);
	for (i=0; i< n-1; i++){
		lista *atual = list->prox;
		for (int k = 0; k < i; k++){
            atual = atual->prox;
        }
        lista *menor = atual;
        lista *aux = atual->prox;
		for (j=i+1; j<n; j++){
			if (aux->valor < menor->valor){
				menor = aux;
			}
			aux = aux->prox;
		}
		if(menor != atual){
			x = atual->valor;
			atual->valor = menor->valor;
			menor->valor = x;	
		}
	}
	
	printf("----------------------------------\n");
	printf("\tLista Ordenada - Selecao\n");
	printf("----------------------------------\n");
	getch();
	system("cls");
}

void ordenar_bubble(lista *list){
	if(checa_lista(list)){
		printf("----------------------------------\n");
		printf("\tLista vazia\n");
		printf("----------------------------------\n");
		getch();
		system("cls");
		return ;
	}
	
	int i, j, n, x;
	n = tamanho_lista(list);
	for (i=1; i<n; i++){
		lista *aux = list->prox;
		for (j=0; j<n-i; j++){
			if (aux->valor > aux->prox->valor){
				x = aux->valor;
				aux->valor = aux->prox->valor;
				aux->prox->valor = x;
			}
			aux = aux->prox;
		}
	}
	
	printf("----------------------------------\n");
	printf("\tLista Ordenada - Bubble\n");
	printf("----------------------------------\n");
	getch();
	system("cls");
}

void ordenar_shell(lista *list){
	if(checa_lista(list)){
		printf("----------------------------------\n");
		printf("\tLista vazia\n");
		printf("----------------------------------\n");
		getch();
		system("cls");
		return ;
	}
	
	int i, j, n, s, x;
	n = tamanho_lista(list);
	for (s=3; s > 0 ; s--){
		for (i=s; i < n; i++){
			lista *atual = list->prox;
			for(int k = 0; k < i; k++){
			    atual = atual->prox;
			}
			j = i;
			x = atual->valor;
			while (j >= s){
				lista *anterior = list->prox;
				for (int k = 0; k < j - s; k++){
					anterior = anterior->prox;
				}
                if (anterior->valor > x) {
                    atual->valor = anterior->valor;
                }else{
                    break;
                }
                j -= s;
                atual = list->prox;
                for (int k = 0; k < j; k++){
                	atual = atual->prox;
				}
			}
			atual->valor = x;
		}
	}
	
	printf("----------------------------------\n");
	printf("\tLista Ordenada - Shell\n");
	printf("----------------------------------\n");
	getch();
	system("cls");
}

// Pesquisar 6
void pesquisa_elemento(lista *list){
	int j;
	printf("Digite o elemento da lista:\n");
	scanf("%d", &j);

	lista *aux = list->prox;
	while( aux != NULL){
		if (aux->valor == j){
			printf("Elemento encontrado = %d\n", aux->valor);
		}
		aux = aux->prox;
	}
	getch();
	system("cls");
}

// Outras Funções
void guardar_lista(lista *list){
	FILE *a;
	a = fopen("arquivo.dat","wb");
	lista *aux = list->prox;
	
	while(aux != NULL){
		fwrite(&aux->valor, sizeof(int), 1, a);
		aux = aux->prox;
	}
	
	fclose(a);
	printf("----------------------------------\n");
	printf("\tLista salva com sucesso!\n");
	printf("----------------------------------\n");
	
	getch();
	system("cls");
}
void recuperar_lista(lista *list){
	FILE *a;
	a = fopen("arquivo.dat","rb");
	lista *aux = list->prox;
	int val;
	
	while(fread(&val, sizeof(int), 1, a)) {
		adiciona_fim(list, val);
    }
	
	fclose(a);
	printf("----------------------------------\n");
	printf("Dados Carregados de um arquivo!\n");
	printf("----------------------------------\n");
	getch();
	system("cls");
}

void inicializa (lista *list){
	int escolha;
	list->prox = NULL;
	list->ant = NULL;
	printf("----------------------------------\n");
	printf("\tLista inicializada\n");
	printf("----------------------------------\n");
	do{
		printf("Carregar Dados de um arquivo? 1- SIM / 2- NAO\n");
		scanf("%d", &escolha);
		if(escolha == 1){
            recuperar_lista(list);
		}else if(escolha == 2){
			system("cls");
        }else{
            printf("Opcao Invalida!!!\n");
            getch();
			system("cls");
		}
	}while(escolha != 1 && escolha != 2);
}

main(){
	int laco=0;
	lista *list = (lista *) malloc(sizeof(lista));
	if(!list){
		printf("Impossivel alocar memoria\n");
		exit(1);
	} else{
		inicializa(list);
		while(laco==0){
			int opcao = menu();
	
			switch(opcao){
				case 1: {
					int numAdicionar;
					printf("Digite um valor para inserir na lista:\n");
					scanf("%d", &numAdicionar);
					adiciona_fim(list, numAdicionar);
					printf("----------------------------------\n");
					printf("Valor Inserido com sucesso!\n");
					printf("----------------------------------\n");
					getch();
					system("cls");
					break;
				}
				case 2: mostra_lista(list); break;
				case 3: remove_final(list); break;
				case 4: limpa_lista(list); break;
				case 5: {
					printf("----------------------------------\n");
					printf("\tTamanho da Lista: %d\n", tamanho_lista(list));
					printf("----------------------------------\n");
					getch();
					system("cls");
					break;
				}
				case 6: pesquisa_elemento(list); break;
				
				case 7: ordenar_insercao(list); break;
				case 8: ordenar_selecao(list); break;
				case 9: ordenar_bubble(list); break;
				case 10: ordenar_shell(list); break;
			
				default: laco = 1;
			}
		}
	}

	guardar_lista(list);
	free(list);
	printf("----------------------------------\n");
	printf("\tSistema Encerrado\n");
	printf("----------------------------------\n");
}