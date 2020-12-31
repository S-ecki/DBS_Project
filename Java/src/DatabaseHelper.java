import java.sql.*;
import java.util.ArrayList;


// The DatabaseHelper class encapsulates the communication with our database
class DatabaseHelper {
    // Database connection info
    private static final String DB_CONNECTION_URL = "jdbc:oracle:thin:@oracle-lab.cs.univie.ac.at:1521:lab";

    //only one connection + statement needed for session
    private static Connection con;
    private static Statement stmt;
    
    //private static int personCounter=20; //TODO: your task --> remove this counter 
    
    //CREATE CONNECTION
    DatabaseHelper() {
        try {
        	//Loads class into the memory
        	Class.forName("oracle.jdbc.driver.OracleDriver");

            // establish connection to database
            con = DriverManager.getConnection(DB_CONNECTION_URL, SensitiveData.USER, SensitiveData.PASS);	//username + password saved in other file that wont be published
            stmt = con.createStatement();
            
        } catch (Exception e) {
        	System.out.println("Error while setting up connection. Stacktrace: ");
            e.printStackTrace();
        }
    }

    
    //INSERT INTO
    void insertIntoHaus(int plz, String strasse, String land, Double groesse) {
        try {
        	String insert = "INSERT INTO haus VALUES (" + plz + ",'" + strasse + "','" + land + "'," + groesse + ")";
        	stmt.execute(insert);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoHaus\nmessage: " + e.getMessage());
        }
    }
    
    void insertIntoHaus(int plz, String strasse, String land) {
        try {
        	String insert = "INSERT INTO haus(plz,strasse,land) VALUES (" + plz + ",'" + strasse + "','" + land + "')";
        	stmt.execute(insert);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoHaus\nmessage: " + e.getMessage());
        }
    }

    
    void selectHausStrasse() {
    	try {
    		ResultSet rs = stmt.executeQuery("SELECT * FROM haus");	//evtl strasse statt *
    		while(rs.next()) {
    			System.out.println(rs.getString("strasse"));
    		}
    		rs.close();
        } catch (Exception e) {
            System.err.println("Error at: selectHaus\nmessage: " + e.getMessage());
        }
    }
    
    int countHaus() {
    	int counter = 0;
    	try {
    		ResultSet rs = stmt.executeQuery("SELECT * FROM haus");	//evtl strasse statt *
    		while(rs.next()) {
    			++counter;
    		}
    		rs.close();
        } catch (Exception e) {
            System.err.println("Error at: selectHaus\nmessage: " + e.getMessage());
        }
    	return counter;
    }
    
    void deleteHaus() {
    	try {
    		String delete = "DELETE FROM haus";
    		stmt.execute(delete);
        } catch (Exception e) {
            System.err.println("Error at: selectHaus\nmessage: " + e.getMessage());
        }
    }



    //SELECT
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


    public void close()  {
        try {
            stmt.close(); //clean up
            con.close();
        } catch (Exception ignored) {
        }
    }
}