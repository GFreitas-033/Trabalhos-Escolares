package br.edu.fatec.tap.feira.feiraAgricola.controller;

import br.edu.fatec.tap.feira.feiraAgricola.dto.ProdutorRuralDTO;
import br.edu.fatec.tap.feira.feiraAgricola.modelo.ProdutorRural;
import br.edu.fatec.tap.feira.feiraAgricola.repository.ProdutorRuralRepository;
import org.springframework.beans.BeanUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
public class ProdutorRuralController {
    @Autowired
    ProdutorRuralRepository repositorio;

    @PostMapping("/produtorRural")
    public ResponseEntity<ProdutorRural> salvarProdutorRural(@RequestBody ProdutorRuralDTO dto){
        var produtor = new ProdutorRural();
        BeanUtils.copyProperties(dto, produtor);
        return ResponseEntity.status(HttpStatus.CREATED)
                .body(repositorio.save(produtor));
    }
    @GetMapping("/produtorRural")
    public ResponseEntity<List<ProdutorRural>> exibirProdutorRural(){
        return ResponseEntity.status(HttpStatus.OK)
                .body(repositorio.findAll());
    }

    @GetMapping("/produtorRural/{id}")
    public ResponseEntity<Object> getProdutorRuralById(@PathVariable(value="id") Integer id){
        Optional<ProdutorRural> produtor = repositorio.findById(id);
        if(produtor.isEmpty()){
            return  ResponseEntity.status(HttpStatus.NOT_FOUND)
                    .body("Produtor Rural não encontrado");
        }
        return ResponseEntity.status(HttpStatus.OK)
                .body(produtor.get());
    }

    @PutMapping("/produtorRural/{id}")
    public ResponseEntity<Object> updateProdutorRural(
            @PathVariable(value="id") Integer id,
            @RequestBody ProdutorRuralDTO dto
    ){
        Optional<ProdutorRural> produtor = repositorio.findById(id);
        if(produtor.isEmpty()){
            return  ResponseEntity.status(HttpStatus.NOT_FOUND)
                    .body("Produtor Rural não encontrado");
        }
        BeanUtils.copyProperties(dto, produtor.get());
        return ResponseEntity.status(HttpStatus.OK)
                .body(repositorio.save(produtor.get()));
    }

    @DeleteMapping("/produtorRural/{id}")
    public ResponseEntity<Object> deleteProdutorRural(@PathVariable(value="id") Integer id){
        Optional<ProdutorRural> produtor = repositorio.findById(id);
        if(produtor.isEmpty()){
            return  ResponseEntity.status(HttpStatus.NOT_FOUND)
                    .body("Produtor Rural não encontrado");
        }
        repositorio.delete(produtor.get());
        return ResponseEntity.status(HttpStatus.OK)
                .body("Produtor Rural Removido com sucesso!");
    }
}
