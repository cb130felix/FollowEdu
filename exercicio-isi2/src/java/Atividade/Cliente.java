package Atividade;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Renan
 */
public class Cliente {
    
    String cpf, nome;
    float valor_comprado;
    
    public String getCPF(){
    
        return this.cpf;
        
    }
    
    
    public String getNome(){
    
        return this.nome;
        
    }

    public Cliente(String cpf, String nome, float valor_comprado) {
        this.cpf = cpf;
        this.nome = nome;
        this.valor_comprado = valor_comprado;
    }
    
    
    public float getValorComprado(){
    
        return this.valor_comprado;
        
    }
    
}
