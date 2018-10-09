package view;

import static java.lang.Integer.parseInt;
import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import planta.Planta;
import planta.dao.PlantaDAO;

public class FXMLCadastroPlantasController implements Initializable {

    @FXML
    private TextArea textDesc;

    @FXML
    private TextField textUmidade;

    @FXML
    private TextField textTemperatura;

    @FXML
    private TextField textNome;

    @FXML
    private Button cadastrar;
    
    @FXML
    private void cadastrar(ActionEvent event) {
        
        boolean transacao = false;
        
        int temperatura = parseInt(textTemperatura.getText());
        int umidade = parseInt(textUmidade.getText());
        
        //objeto planta
        Planta planta = new Planta();
        planta.setNome(textNome.getText());
        planta.setDescrição(textDesc.getText());
        planta.setUmidade(umidade);
        planta.setTemperatura(temperatura);
        
        PlantaDAO dao = new PlantaDAO();
        //dao.salvarPlanta(textNome.getText(), textDesc.getText(), temperatura, umidade);
        transacao = dao.inserirPlanta(planta);
        
        if (transacao) {
            Alert dialogoInfo = new Alert(Alert.AlertType.INFORMATION);
            dialogoInfo.setTitle("Cadastro de Planta");
            dialogoInfo.setHeaderText("Planta cadastrado com sucesso!");
            dialogoInfo.setContentText("");
            dialogoInfo.showAndWait();
            
            textNome.setText("");
            textDesc.setText("");
            textUmidade.setText("");
            textTemperatura.setText("");
            
            
        }else{
            Alert dialogoInfo = new Alert(Alert.AlertType.INFORMATION);
            dialogoInfo.setTitle("Cadastro de Planta");
            dialogoInfo.setHeaderText("Erro ao cadastrar!");
            dialogoInfo.setContentText("");
            dialogoInfo.showAndWait();
        }
        
    }
    
    
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
    
}
