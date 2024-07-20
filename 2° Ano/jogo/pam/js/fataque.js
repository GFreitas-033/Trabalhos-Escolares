//Fazer o Pedra Papel e Tesoura funcionar
var botoes = document.querySelectorAll('.btn')

function aleatorio(min, max) {
    return (Math.random() * (max - min) + min).toFixed()
}

botoes.forEach(function (botao){
    botao.addEventListener('click', function(){
        var valorbtn = this.dataset.value
        console.log(valorbtn)

        var comp = aleatorio(1, 3);
        console.log(comp)

        if((valorbtn==1 && comp==3) || (valorbtn==2 && comp==1) || (valorbtn==3 && comp==2)){
            alert("Você Ganhou!!!")
        }else if((comp==1 && valorbtn==3) || (comp==2 && valorbtn==1) || (comp==3 && valorbtn==2)){
            alert("Computador Ganhou!!!")
        }else{
            alert("Empate")
        }
    })
})


// Estrutura de dados para armazenar informações dos personagens e seus ataques
const characters = {
  character1: {
    attacks: {
      slash: 40,
      thrust: 30,
      bash: 20,
      defense: 20,
    },
  },
  character2: {
    attacks: {
      slash: 50,
      thrust: 35,
      bash: 45,
      defense: 10,
 },
  },
  character3: {
    attacks: {
      slash: 35,
      thrust: 25,
      bash: 30,
      defense: 25,
    },
  },
};

// Função de Ataque
function attack(attackType, character) {
  const damage = getDamage(attackType, character);
  // Chama a função de ataque com o dano calculado
  performAttack(damage, character.defender);
}

// Função para obter o dano com base no tipo de ataque e personagem selecionado
function getDamage(attackType, character) {
  return characters[character].attacks[attackType] || 0;
}

// Função de realizar o ataque
function performAttack(damage, defender) {
  const attackerAttackPower = damage;
  const defenderDefensePower = defender.getDefensePower();
  const damageDealt = attackerAttackPower - defenderDefensePower;
  defender.setLife(defender.getLife() - damageDealt);

  // Atualiza a barra de vida do defensor
  changeLifeBar(defender.getLifeBarElement(), defender.getLife());
}

// Função de Mudar a vida
function changeLifeBar(lifeBar, life) {
  var currentWidth = lifeBar.style.width;
  var newWidth = currentWidth - (life * 10);
  lifeBar.style.width = newWidth;
  life = (newWidth / 100) * 100;
}