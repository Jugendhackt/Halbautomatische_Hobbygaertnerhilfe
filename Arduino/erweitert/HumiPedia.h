#define HumiPediaServer "https://lenticellate-glossa.000webhostapp.com/humipedia/plant.php"
#include <HTTPClient.h>

String request(String plant){
	HTTPClient http;
	http.begin(HumiPediaServer+"?plant_id="+plant+"&AHH");
	int httpCode = http.GET();
	if(httpCode > 0){
	    String payload = http.getString();
	    return payload;
	}else{return "error "+httpcode;}
}
