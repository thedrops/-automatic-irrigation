
package planta;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;


public class Registro {
    
    int id_planta;
    int umidade;
    int temperatura;
    String data_registro;

    public int getId_planta() {
        return id_planta;
    }

    public void setId_planta(int id_planta) {
        this.id_planta = id_planta;
    }

    public int getUmidade() {
        return umidade;
    }

    public void setUmidade(int umidade) {
        this.umidade = umidade;
    }

    public int getTemperatura() {
        return temperatura;
    }

    public void setTemperatura(int temperatura) {
        this.temperatura = temperatura;
    }

    public String getData_registro() {
        return data_registro;
    }

    public void setData_registro(String data_registro) {
        this.data_registro = data_registro;
    }
    
    public String getDateTime() { 
	DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss"); 
	Date date = new Date(); 
	return dateFormat.format(date); 
}
    
    
    
}
