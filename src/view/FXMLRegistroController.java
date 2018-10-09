/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package view;

import static java.lang.Integer.parseInt;
import java.net.URL;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ChoiceBox;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import planta.Planta;
import planta.Registro;
import planta.dao.PlantaDAO;
import planta.dao.RegistroDAO;

/**
 * FXML Controller class
 *
 * @author PEDRO HENRIQUE
 */
public class FXMLRegistroController implements Initializable {

    
    @FXML
    private TextField textUmidade;

    @FXML
    private TextField textTemperatura;

    @FXML
    private ChoiceBox choicePlanta;

    @FXML
    private Button keppo;
    
    @FXML
    private void cadastrarRegistro(ActionEvent event){
      
      //criação da variável de confirmação da transação 
      boolean transacao; 
      
      //Pesquisa das plantas no bd
        PlantaDAO dao = new PlantaDAO();
        ArrayList<Planta> planta = new ArrayList<>();
         try {
            planta=dao.pesquisa();
        } catch (SQLException ex) {
            Logger.getLogger(view.FXMLRegistroController.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        
        int umidade = parseInt(textUmidade.getText());
        int temperatura = parseInt(textTemperatura.getText());
        
        Registro registro = new Registro();
        registro.setData_registro(registro.getDateTime());
        registro.setUmidade(umidade);
        registro.setTemperatura(temperatura);
        
        //pegar dado referente a planta escolhida no choice box
        String escolha = choicePlanta.getValue().toString();
        int id_planta = 0;
        for(Planta i : planta){
            if (i.getNome().equals(escolha)) {
                id_planta=i.getId();
            }
        }
        
        registro.setId_planta(id_planta);
        
        RegistroDAO rdao = new RegistroDAO();
        transacao = rdao.inserirRegistro(registro);
        if (transacao) {
            Alert dialogoInfo = new Alert(Alert.AlertType.INFORMATION);
            dialogoInfo.setTitle("Cadastro de Registro");
            dialogoInfo.setHeaderText("Registro cadastrado com sucesso!");
            dialogoInfo.setContentText("");
            dialogoInfo.showAndWait();

            textUmidade.setText("");
            textTemperatura.setText("");
            
            
            
        }else{
            Alert dialogoInfo = new Alert(Alert.AlertType.INFORMATION);
            dialogoInfo.setTitle("Cadastro de Registro");
            dialogoInfo.setHeaderText("Erro ao cadastrar!");
            dialogoInfo.setContentText("");
            dialogoInfo.showAndWait();
        }
        
        
    }
    
    
    
    
    
    
    
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        PlantaDAO dao = new PlantaDAO();
        ArrayList<Planta> planta = new ArrayList<>();
         try {
            planta=dao.pesquisa();
        } catch (SQLException ex) {
            Logger.getLogger(view.FXMLRegistroController.class.getName()).log(Level.SEVERE, null, ex);
        }
         
        
        ArrayList<String> nomes = new ArrayList<>();
        for(Planta i : planta){
            nomes.add(i.getNome());
        }
        
        choicePlanta.getItems().addAll(nomes);
       
        
    }    
    
}
