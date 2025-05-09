#include <stdio.h>

void situacaoAluno(float m){
	if(m>=6){
		printf("O Aluno foi Aprovado. Media do Aluno: %2.1f", m);
	}else if(m<=5.9){
		printf("O Aluno foi Reprovado. Media do Aluno: %2.1f", m);
	}
}

void mediaAluno(float n1,float n2){
	float media;
	media = (n1+n2)/2;
	situacaoAluno(media);
}

main(){
	float nota1, nota2;
	
	printf("Digite a primeira Nota:\n");
	scanf("%f", &nota1);
	printf("Digite a segunda Nota:\n");
	scanf("%f", &nota2);
	
	mediaAluno(nota1,nota2);
}