import java.io.BufferedReader;
import java.io.FileReader;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;

// wraps around java.util.Random for convinience
class RandomHelper {
    private Random rand = new Random();


/*
    //returns random double from the Interval [min, max] and a defined precision (e.g. precision:2 => 3.14)
    Double getRandomDouble(double min, double max, int precision) {
        //Hack that is not the cleanest way to ensure a specific precision, but...
        double r = Math.pow(10, precision);
        return Math.round(min + (rand.nextDouble() * (max - min)) * r) / r;
    }
*/
    
    //creates random boolean
    Boolean randomBool() {
    	return rand.nextBoolean();
    }
    
  //creates random int from interval (min, max)
    Integer randomInteger(int min, int max) {		
        return rand.nextInt((max - min) + 1) + min;
    }
    
    //creates 3 DIFFERENT random int from iterval (min, max)
    int[] nRandomIntegers(int min, int max, int n) {
    	int[] ri = new int[n];
    	List<Integer> control = new ArrayList<>();
    	
    	for(int i = 0; i < n; ++i) {
    		do { ri[i] = randomInteger(min, max); } while(control.contains(ri[i]));		//check if new int is different to all others
    		control.add(ri[i]);
    	} 
		return ri;
    }
   
}