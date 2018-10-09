
package planta.dao;

import conexao.Conexao;
import planta.Registro;

public class RegistroDAO {
    private final Conexao conexao;
    
    public RegistroDAO(){
        
         conexao=new Conexao();
         conexao.configurar();
         
    }
    
    public boolean inserirRegistro(Registro registro){
      String sql= "insert into registro(data_registro,umidade,temperatura,id_planta) values('"+registro.getData_registro()+"',"
                + "'"+registro.getUmidade()+"',"+registro.getTemperatura()+","+registro.getId_planta()+")";
        
        //conectar com banco de dados
        conexao.conectar();
        
        boolean b = conexao.executarComandosSQL(sql);
        
        //retornar erro ou Ok
        return b;
    }
    
    
    
}
