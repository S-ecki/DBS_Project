import java.io.BufferedReader;
import java.io.FileReader;
import java.util.ArrayList;
import java.util.List;

class CSVHelper {
	//TODO
	public static final String traineeFile = "";
	public static final String trainerFile = "";
	public static final String studioFile = "";
	public static final String geraetFile = "";
	public static final String uebungFile = "";
	public static final String muskelFile = "";
	
	public List<String[]> getDataFromCsv(String csv) {	//String csv must be filepath
		
		List<String[]> data = new ArrayList<>();	//each String[] is a row, List is data for whole table
		String line = "";
		
		try {
			BufferedReader br = new BufferedReader(new FileReader(csv));
			
			while((line = br.readLine()) != null) {
				String[] tupel = line.split(",");		//split to get seperate attributes
				data.add(tupel);
			}
			br.close();
		} catch (Exception e) {
			System.out.println("Error while getting Data from Csv: ");
			e.printStackTrace();
		}
		
		return data;
	}
}
