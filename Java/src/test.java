import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.sql.*;

public class test {

	public static void main(String args[]) throws IOException {
	    /*try {
	      // Loads the class "oracle.jdbc.driver.OracleDriver" into the memory
	      Class.forName("oracle.jdbc.driver.OracleDriver");

	      // Connection details
	      String database = "jdbc:oracle:thin:@oracle-lab.cs.univie.ac.at:1521:lab";
	      String user = "a11911424";
	      String pass = "dbs20";

	      // Establish a connection to the database
	      Connection con = DriverManager.getConnection(database, user, pass);
	      Statement stmt = con.createStatement();
*/
	     // Insert a single dataset into the table "person"
	     /* try {
	        String insertSql = "INSERT INTO geraet(firma, g_name, g_kosten, plz, strasse, land) VALUES('Gym80', 'Sitting Triceps Extension', 500, 4621, 'Sitzbergstrasse 28', 'Österreich')";
	     
	//executeUpdate Method: Executes the SQL statement, which can be an INSERT, UPDATE, or DELETE statement
	        int rowsAffected = stmt.executeUpdate(insertSql);
	      } catch (Exception e) {
	        System.err.println("Error while executing INSERT INTO statement: " + e.getMessage());
	      }
	    
	// Check number of datasets in person table
	      ResultSet rs = stmt.executeQuery("SELECT COUNT(*) FROM haus");
	      if (rs.next()) {
	        int count = rs.getInt(1);
	        System.out.println("Number of datasets: " + count);
	     }

	     // Clean up connections
	      rs.close();
	      stmt.close();
	      con.close();
	    } catch (Exception e) {
	      System.err.println(e.getMessage());
	    }
	   */
		DatabaseHelper dbhelper = new DatabaseHelper();
		
		dbhelper.deleteHaus();
		
		System.out.println(dbhelper.countHaus());
		
		String line = "";
		BufferedReader br = new BufferedReader(new FileReader("C:\\Coding\\Workspace\\DBS\\src\\input\\MOCK_DATA.csv"));
		
		while((line = br.readLine()) != null) {
			String[] data = line.split(",");
			
			if(data.length == 4)	dbhelper.insertIntoHaus(Integer.parseInt(data[0]), data[1], data[2], Double.parseDouble(data[3]));
			else dbhelper.insertIntoHaus(Integer.parseInt(data[0]), data[1], data[2]);
		}
		
		
		System.out.println(dbhelper.countHaus());
		
		/*
		
		for(int i = 0; i < 100; ++i) {
			
		}
		System.out.println(dbhelper.countHaus());
		//dbhelper.selectHausStrasse();
		dbhelper.close();
		*/
	  }		
}
