#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>

typedef struct No {
    char valor[100];
    struct No *sim;
    struct No *nao;
} No;

void iniciarArvore(No** raiz);
No* criarNo(char texto[100]);
void jogar(No** raiz);
void apagarArvore(No* raiz);

No* carregarArvore(FILE* a) {
    char flag;

    if (fread(&flag, sizeof(char), 1, a) != 1){
        return NULL;	
	}

    if (flag == '0') {
        return NULL;
    }

    No* novo = (No*) malloc(sizeof(No));
    if(!novo){
    	return NULL;
	}
	if(fread(novo->valor, sizeof(char), 100, a) != 100){
		free(novo);
        return NULL;
	}

    novo->sim = carregarArvore(a);
    novo->nao = carregarArvore(a);

    return novo;
}

void salvarArvore(No* raiz, FILE* a) {
    if (raiz == NULL) {
        char flag = '0';
        fwrite(&flag, sizeof(char), 1, a);
        return;
    }

    char flag = '1';
    fwrite(&flag, sizeof(char), 1, a);
    fwrite(raiz->valor, sizeof(char), 100, a);

    salvarArvore(raiz->sim, a);
    salvarArvore(raiz->nao, a);
}

void salvar(No* raiz) {
    FILE* a = fopen("arquivo.dat", "wb");
    if (a != NULL) {
        salvarArvore(raiz, a);
        fclose(a);
    }
}

int main(void) {
    No* raiz;
    
    iniciarArvore(&raiz);
    
	if(raiz == NULL){
    	raiz = criarNo("O seu animal sabe escalar?");
	    raiz->nao = criarNo("Cachorro");
    	raiz->sim = criarNo("Gato");
	}
    jogar(&raiz);

	salvar(raiz);
    apagarArvore(raiz);
    return 0;
}

void iniciarArvore(No** raiz) {
    FILE *a;
	a = fopen("arquivo.dat","rb");
	
	if(a==NULL){
		*raiz = NULL;
		return;
	}	

    *raiz = carregarArvore(a);

	fclose(a);
}

No* criarNo(char texto[100]) {
    No* novo = (No*) malloc(sizeof(No));
    strcpy(novo->valor, texto);
    novo->sim = NULL;
    novo->nao = NULL;
    return novo;
}

void jogar(No** raiz) {

    int resposta;

    if ((*raiz)->nao == NULL && (*raiz)->sim == NULL) {
        printf("O seu animal e %s?: ",(*raiz)->valor);
        fflush(stdin);
        resposta = getchar();
        system("cls");
        if (resposta == 's') {
            printf("Eu acertei! O jogo acabou.");
            fflush(stdin);
            getch();
            system("cls");
        }else if (resposta == 'n') {
            printf("Eu perdi! Qual era o seu animal?: ");
            char animal[100];
            fflush(stdin);
            gets(animal);
            system("cls");
            printf("Qual pergunta diferencia %s de %s?: ",animal,(*raiz)->valor);
            char pergunta[100];
            fflush(stdin);
            gets(pergunta);
            (*raiz)->nao = criarNo((*raiz)->valor);
            (*raiz)->sim = criarNo(animal);
            strcpy((*raiz)->valor, pergunta);
            system("cls");
        }
    }else {
        printf("%s: ",(*raiz)->valor);
        fflush(stdin);
        resposta = getchar();
        system("cls");
        if (resposta == 's') {
            jogar(&(*raiz)->sim);
        }else if (resposta == 'n') {
            jogar(&(*raiz)->nao);
        }
    }
}

void apagarArvore(No* raiz) {
    if (raiz == NULL) {
        return;
    }

    apagarArvore(raiz->sim);
    apagarArvore(raiz->nao);

    free(raiz);
}
