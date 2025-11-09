package br.edu.fatec.tap.feira.feiraAgricola.controller;

import br.edu.fatec.tap.feira.feiraAgricola.dto.ProdutoDTO;
import br.edu.fatec.tap.feira.feiraAgricola.modelo.Produto;
import br.edu.fatec.tap.feira.feiraAgricola.repository.ProdutoRepository;
import org.springframework.beans.BeanUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class ProdutoController {
    @Autowired
    ProdutoRepository repositorio;

    @PostMapping("/produto")
    public ResponseEntity<Produto> salvarProduto(@RequestBody ProdutoDTO dto){
        var produto = new Produto();
        BeanUtils.copyProperties(dto, produto);
        return ResponseEntity.status(HttpStatus.CREATED)
                        .body(repositorio.save(produto));
    }
    @GetMapping("/produto")
    public ResponseEntity<String> exibirProduto(){
        return ResponseEntity.status(HttpStatus.CREATED)
                .body("Oi!");
    }
}
