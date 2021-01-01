import java.sql.*;
import java.util.ArrayList;
import java.util.List;


// The DatabaseHelper class encapsulates the communication with the database
class DatabaseHelper {
    private static final String DB_CONNECTION_URL = "jdbc:oracle:thin:@oracle-lab.cs.univie.ac.at:1521:lab";	// Database connection info
    
    private static Connection con;	   //only one connection + statement needed for session
    private static Statement stmt;
    
    DatabaseHelper() {	//CREATE CONNECTION
        try {
        	//Loads class into the memory
        	Class.forName("oracle.jdbc.driver.OracleDriver");

            //establish connection to database
            con = DriverManager.getConnection(DB_CONNECTION_URL, SensitiveData.USER, SensitiveData.PASS);	//username + password saved in other file that wont be published
            stmt = con.createStatement();
            
        } catch (Exception e) {
        	System.out.println("Error while setting up connection. Stacktrace: ");
            e.printStackTrace();
        }
    }

    
//INSERTS
    //input from String[], parsing here
    void insertTrainee(String svnr, String name, String geschlecht, String groesse, String gewicht, String zgewicht, String erfahrung) {
        try {
        	//create insert statement
        	String insert = "INSERT INTO trainee VALUES (" + 
        			Long.parseLong(svnr) + ",'" +
        			name + "','" + 
        			geschlecht + "'," + 
        			Double.parseDouble(groesse) + "," +
        			Double.parseDouble(gewicht) + "," +
        			Double.parseDouble(zgewicht) + "," +
        			Integer.parseInt(erfahrung) +
        			")";
        	stmt.execute(insert);
        } catch (Exception e) {
            System.err.println("Error at: insert Trainee");
            e.printStackTrace();
        }
    }
    
    void insertTrainer(String svnr, String name, String geschlecht, String groesse, String gewicht, String id, String kosten, String sp) {
        try {
        	String insert = "INSERT INTO trainer VALUES (" +
        			Long.parseLong(svnr) + ",'" +
        			name + "','" + 
        			geschlecht + "'," + 
        			Double.parseDouble(groesse) + "," +
        			Double.parseDouble(gewicht) + "," +
        			Integer.parseInt(id) + "," +
        			Integer.parseInt(kosten) + ",'" +
        			sp + 
        			"')";
        	stmt.execute(insert);
        } catch (Exception e) {
            System.err.println("Error at: insert Trainer");
            e.printStackTrace();
        }
    }
    
    void insertStudio(String plz, String strasse, String land, String name, String kosten, String flaeche) {
        try {
        	String insert = "INSERT INTO studio VALUES (" + 
        			Integer.parseInt(plz) + ",'" +
        			strasse + "','" + 
        			land + "','" + 
        			name + "'," +
        			Integer.parseInt(kosten) + "," +
        			Double.parseDouble(flaeche) +
        			")";
        	stmt.execute(insert);
        } catch (Exception e) {
            System.err.println("Error at: insert Studio");
            e.printStackTrace();
        }
    }
    
    void insertGeraet(String firma, String nummer, String name, String kosten, String plz, String strasse, String land) {
        try {
        	String insert = "INSERT INTO geraet VALUES ('" +
        			firma + "'," + 
        			Integer.parseInt(nummer) + ",'" +
        			name + "'," +
        			Integer.parseInt(kosten) + "," +
        			Integer.parseInt(plz) + ",'" +
        			strasse + "','" +
        			land +
        			"')";
        	stmt.execute(insert);
        } catch (Exception e) {
            System.err.println("Error at: insert Geraet");
            e.printStackTrace();
        }
    }
    
    void insertUebung(String firma, String nummer, String name, String schwierigkeit, String whg) {
        try {
        	String insert = "INSERT INTO uebung VALUES ('" +
        			firma + "'," + 
        			Integer.parseInt(nummer) + ",'" +
        			name + "'," +
        			Integer.parseInt(schwierigkeit) + "," +
        			Integer.parseInt(whg) + 
        			")";
        	stmt.execute(insert);
        } catch (Exception e) {
            System.err.println("Error at: insert Uebung");
            e.printStackTrace();
        }
    }
    
    //ID is created by trigger, therefore not a parameter of this function
    void insertMuskel(String bezeichnung, String mv) {
        try {
        	String insert = "INSERT INTO muskel(bezeichnung, mv) VALUES ('" +
        			bezeichnung + "'," + 
        			Integer.parseInt(mv) +
        			")";
        	stmt.execute(insert);
        } catch (Exception e) {
            System.err.println("Error at: insert Muskel");
            e.printStackTrace();
        }
    }
    
    void insertTP(String svnr1, String svnr2) {
        try {
        	String insert = "INSERT INTO trainingspartner VALUES (" +
        			Integer.parseInt(svnr1) + "," +
        			Integer.parseInt(svnr2) + "," +
        			")";
        	stmt.execute(insert);
        } catch (Exception e) {
            System.err.println("Error at: insert Trainingspartner");
            e.printStackTrace();
        }
    }
    
    void insertTraining(String svnr, String plz, String strasse, String land, String t_id, int sessions) {
        try {
        	String insert;
        	//trainer is part of relation
        	if(t_id != null) {
        		insert = "INSERT INTO training VALUES (" +
            		Integer.parseInt(svnr) + "," +
            		Integer.parseInt(plz) + ",'" +
            		strasse + "','" +
            		land + "'," +
            		Integer.parseInt(t_id) + "," +
            		sessions +
            		")";
        	//no trainer is part of relation
        	}else {
        		insert = "INSERT INTO training(svnr,plz,strasse,land,sessions_woche) VALUES (" +
            		Integer.parseInt(svnr) + "," +
            		Integer.parseInt(plz) + ",'" +
            		strasse + "','" +
            		land + "'," +
            		sessions +
            		")";
        	}
			stmt.execute(insert);
        } catch (Exception e) {
            System.err.println("Error at: insert Training");
            e.printStackTrace();
        }
    }
     
    void insertKonditioniert(String m_id, String firma, String nummer, String ue_name) {
        try {
        	String insert = "INSERT INTO konditioniert VALUES (" +
        			Integer.parseInt(m_id) + ",'" +
        			firma + "'," +
        			Integer.parseInt(nummer) + ",'" +
        			ue_name +
        			"')";
        	stmt.execute(insert);
        } catch (Exception e) {
            System.err.println("Error at: insert konditioniert");
            e.printStackTrace();
        }
    }
   
//COUNT   
    public void countAll() {		//TODO precompiled 
    	int result = 0;
    	try {
	    	ResultSet rs = stmt.executeQuery("SELECT COUNT(*) FROM trainee");	//count rows of a table and print result
		    if (rs.next())	result = rs.getInt(1);								//do this for each table
		    System.out.println("Trainee Count : " + result);
		    
		    rs = stmt.executeQuery("SELECT COUNT(*) FROM trainer");
		    if (rs.next())	result = rs.getInt(1);
		    System.out.println("Trainer Count : " + result);
		    
		    rs = stmt.executeQuery("SELECT COUNT(*) FROM studio");
		    if (rs.next())	result = rs.getInt(1);
		    System.out.println("Studio Count : " + result);
		    
		    rs = stmt.executeQuery("SELECT COUNT(*) FROM geraet");
		    if (rs.next())	result = rs.getInt(1);
		    System.out.println("Geraet Count : " + result);
		    
		    rs = stmt.executeQuery("SELECT COUNT(*) FROM uebung");
		    if (rs.next())	result = rs.getInt(1);
		    System.out.println("Uebung Count : " + result);
		    
		    rs = stmt.executeQuery("SELECT COUNT(*) FROM muskel");
		    if (rs.next())	result = rs.getInt(1);
		    System.out.println("Muskel Count : " + result);
		    
		    rs = stmt.executeQuery("SELECT COUNT(*) FROM trainingspartner");
		    if (rs.next())	result = rs.getInt(1);
		    System.out.println("Trainingspartner Count : " + result);
		    
		    rs = stmt.executeQuery("SELECT COUNT(*) FROM training");
		    if (rs.next())	result = rs.getInt(1);
		    System.out.println("Training Count : " + result);
		    
		    rs = stmt.executeQuery("SELECT COUNT(*) FROM konditioniert");
		    if (rs.next())	result = rs.getInt(1);
		    System.out.println("Konditioniert Count : " + result);
		    
    	}catch(Exception e) {
    		System.out.println("Error while counting: ");
    		e.printStackTrace();
    	}
    }
    
    
//DELETE
    void deleteAllEntries() {	//TODO precompiled
    	try {
    		String delete = "DELETE FROM trainee";		//delete all entries of a table
    		stmt.execute(delete);						//do this for each table
    		
    		delete = "DELETE FROM trainer";
    		stmt.execute(delete);
    		
    		delete = "DELETE FROM studio";
    		stmt.execute(delete);
    		
    		delete = "DELETE FROM geraet";
    		stmt.execute(delete);
    		
    		delete = "DELETE FROM uebung";
    		stmt.execute(delete);
    		
    		delete = "DELETE FROM muskel";
    		stmt.execute(delete);
    		
    		delete = "DELETE FROM trainingspartner";
    		stmt.execute(delete);
    		
    		delete = "DELETE FROM training";
    		stmt.execute(delete);
    		
    		delete = "DELETE FROM konditioniert";
    		stmt.execute(delete);
    		
        } catch (Exception e) {
            System.err.println("Error while deleteing all");
            e.printStackTrace();
        }
    }



//SELECT
    
    //returns list of muskel - primary keys (m_id)
    //needed, because m_id is created by trigger
    //retrieved as a String to keep type consistency across key-lists
    List<String> selectIdFromMuskel(){
    	List<String> IDs = new ArrayList<>();
    	try {
    		ResultSet rs = stmt.executeQuery("SELECT m_id FROM muskel");
    		while(rs.next()) IDs.add(rs.getNString("m_id"));    	
    		rs.close();
    	}catch(Exception e) {
    		System.out.println("Error while selecting m_id: ");
    		e.printStackTrace();
    	}
    	return IDs;
    }
    
    /*
    ArrayList<Integer> selectPersonIdsFromPerson() {
        ArrayList<Integer> IDs = new ArrayList<>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT PERSON_ID FROM PERSON ORDER BY PERSON_ID");
            while (rs.next()) {
                IDs.add(rs.getInt("PERSON_ID"));
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectPersonIsFromPerson\n message: " + e.getMessage()).trim());
        }
        return IDs;
    }
    */
    
//clean up connection
    public void close()  {	
        try {
            stmt.close(); 
            con.close();
        } catch (Exception ignored) { }
    }
    
    //appends one String to a String Array
    //needed to store uebung - primary key
	public String[] concatenate(String[] left, String right) {
	    String[] newArray = new String[left.length + 1];
	    
	    for(int i = 0; i < left.length; ++i) {
	    	newArray[i] = left[i];
	    }
	    newArray[left.length] = right;
	    return newArray;
	}
}