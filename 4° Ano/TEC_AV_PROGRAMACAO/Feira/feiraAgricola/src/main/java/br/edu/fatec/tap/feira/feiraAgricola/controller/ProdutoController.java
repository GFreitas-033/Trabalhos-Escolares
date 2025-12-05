package br.edu.fatec.tap.feira.feiraAgricola.controller;

import br.edu.fatec.tap.feira.feiraAgricola.dto.ProdutoDTO;
import br.edu.fatec.tap.feira.feiraAgricola.modelo.Produto;
import br.edu.fatec.tap.feira.feiraAgricola.repository.ProdutoRepository;
import org.springframework.beans.BeanUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

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
    public ResponseEntity<List<Produto>> exibirProduto(){
        return ResponseEntity.status(HttpStatus.OK)
                .body(repositorio.findAll());
    }

    @GetMapping("/produto/{id}")
    public ResponseEntity<Object> getProdutoById(@PathVariable(value="id") Integer id){
        Optional<Produto> produto = repositorio.findById(id);
        if(produto.isEmpty()){
            return  ResponseEntity.status(HttpStatus.NOT_FOUND)
                    .body("Produto não encontrado");
        }
        return ResponseEntity.status(HttpStatus.OK)
                .body(produto.get());
    }

    @PutMapping("/produto/{id}")
    public ResponseEntity<Object> updateProduto(
            @PathVariable(value="id") Integer id,
            @RequestBody ProdutoDTO dto
    ){
        Optional<Produto> produto = repositorio.findById(id);
        if(produto.isEmpty()){
            return  ResponseEntity.status(HttpStatus.NOT_FOUND)
                    .body("Produto não encontrado");
        }
        BeanUtils.copyProperties(dto, produto.get());
        return ResponseEntity.status(HttpStatus.OK)
                .body(repositorio.save(produto.get()));
    }

    @DeleteMapping("/produto/{id}")
    public ResponseEntity<Object> deleteProduto(@PathVariable(value="id") Integer id){
        Optional<Produto> produto = repositorio.findById(id);
        if(produto.isEmpty()){
            return  ResponseEntity.status(HttpStatus.NOT_FOUND)
                    .body("Produto não encontrado");
        }
        repositorio.delete(produto.get());
        return ResponseEntity.status(HttpStatus.OK)
                .body("Produto Removido com sucesso!");
    }
}
