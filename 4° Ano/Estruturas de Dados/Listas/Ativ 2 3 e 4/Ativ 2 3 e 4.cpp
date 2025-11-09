#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>

struct No {
	int valor;
	struct No *prox;
};
typedef struct No lista;

int checa_lista(lista *list){
	if(list->prox == NULL){
		return 1;
	}else{
		return 0;
	}
}

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
		printf("2 - Inserir Inicio\n");
		printf("3 - Inserir em uma Posicao\n");
		printf("4 - Alterar Dados\n");
		printf("5 - Mostrar Lista\n");
		printf("6 - Remover Inicio\n");
		printf("7 - Remover Final\n");
		printf("8 - Remover em uma Posicao\n");
		printf("9 - Limpar Lista\n");
		printf("10 - Tamanho da Lista\n");
		printf("11 - Pesquisar Elemento\n");
		
		printf("0 - Sair\n");
		printf("----------------------------------\n");
		scanf("%d", &op);
		system("cls");
	} while (op<0 || op>11);
	return op;
}

// Adicionar
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
	}else{ 
		lista *aux = list->prox;
		while(aux->prox != NULL){
			aux = aux->prox;
		}
		aux->prox = novo;
	}
}
void adiciona_inicio(lista *list){
	lista *novo = (lista *) malloc(sizeof(lista));
	if(!novo){
		printf("Impossivel alocar memoria\n");
		exit(1);
	}
	printf("Digite um valor para inserir na lista:\n");
	scanf("%d", &novo->valor);
	lista *aux = list->prox;
	list->prox = novo;
	novo->prox = aux;
	printf("----------------------------------\n");
	printf("Valor Inserido com sucesso!\n");
	printf("----------------------------------\n");
	getch();
	system("cls");
}
void adiciona_posicao(lista *list){
	int cont=1,pos,i;
	lista *novo = (lista *) malloc(sizeof(lista));
	lista *aux = list;
	lista *ant = list;
	if(!novo){
		printf("Impossivel alocar memoria\n");
		exit(1);
	}
	i = tamanho_lista(list);
	printf("Qual posicao (1 ate %d) deseja adicionar:\n",i+1);
	scanf("%d", &pos);
	printf("Digite um valor para inserir na lista:\n");
	scanf("%d", &novo->valor);
	if(pos>0 && pos <= i+1){
		while (cont <= pos){
			ant = aux;
			aux = aux->prox;
			if (cont == pos){
				ant->prox = novo;
				novo->prox = aux;
			}
			cont++;
		}
		printf("----------------------------------\n");
		printf("Valor Inserido com sucesso!\n");
		printf("----------------------------------\n");
	}else{
		printf("----------------------------------\n");
		printf("\tPosicao invalida!\n");
		printf("----------------------------------\n");
	}
	getch();
	system("cls");
}

// Remover
void remove_inicio (lista *list){
	if(checa_lista(list)){
		printf("----------------------------------\n");
		printf("\tA lista está vazia!\n");
		printf("----------------------------------\n");
		getch();
		system("cls");
		return;
	}
	
	lista *aux = list->prox;
	list->prox = list->prox -> prox;
	free(aux);
	
	printf("-------------------------------------------\n");
	printf("Removendo o primeiro elemento da Lista!\n");
	printf("-------------------------------------------\n");
	getch();
	system("cls");
}

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
		if (atual->prox == NULL){ 
			head->prox = NULL;
			free(atual);
		}
		printf("----------------------------------\n");
		printf("Lista limpa com sucesso!!! \n");
		printf("----------------------------------\n");
	}
}


// Mostrar
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

// Só para não dar erro
void teste(){
	printf("Teste\n");
}

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
				case 2: adiciona_inicio(list); break;
				case 3: adiciona_posicao(list); break;
				case 4: teste(); break;
				case 5: mostra_lista(list); break;
				case 6: remove_inicio(list); break;
				case 7: remove_final(list); break;
				case 8: teste(); break;
				case 9: limpa_lista(list); break;
				case 10: {
					printf("----------------------------------\n");
					printf("\tTamanho da Lista: %d\n", tamanho_lista(list));
					printf("----------------------------------\n");
					getch();
					system("cls");
					break;
				}
				case 11: pesquisa_elemento(list); break;
			
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