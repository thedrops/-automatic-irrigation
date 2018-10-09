
package planta.dao;

import conexao.Conexao;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import planta.Planta;

public class PlantaDAO{
    private final Conexao conexao;
    
    public PlantaDAO(){
        
         conexao=new Conexao();
         conexao.configurar();
    }
    
    public void salvarPlanta(String nome,String descricao,int temperatura,int umidade){
        //iniciar planta
        Planta planta = new Planta();
        planta.setNome(nome);
        planta.setDescrição(descricao);
        planta.setTemperatura(temperatura);
        planta.setUmidade(umidade);
        
    
    }
    
    public boolean inserirPlanta(Planta planta){
        String sql= "insert into planta(nome_planta,descricao,umidade,temperatura) values('"+planta.getNome()+"',"
                + "'"+planta.getDescricao()+"',"+planta.getUmidade()+","+planta.getTemperatura()+")";
        
        //conectar com banco de dados
        conexao.conectar();
        
        boolean b = conexao.executarComandosSQL(sql);
        
        //retornar erro ou Ok
        return b;
    }
    
    public  ArrayList<Planta> pesquisa() throws SQLException{


      String sql = "SELECT * FROM planta"; 
      ArrayList<Planta> lista = new ArrayList<>();
      conexao.conectar();



          try (ResultSet rs = conexao.pegarResultadoSQL(sql)) {        
              while(rs.next()){
                  Planta planta = new Planta();
                  
                  planta.setId(rs.getInt(1));
                  planta.setNome(rs.getString(2));

                  lista.add(planta);

              }
              rs.close();  
          }

      return lista;
  }

    
    
}
