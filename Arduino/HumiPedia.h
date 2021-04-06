#define HumiPediaServer "example.com/plant.php"
#include <HTTPClient.h>

String request(String plant){
	HTTPClient http;
	http.begin(HumiPediaServer+"?plant_id="+plant+"&AHH=true");
	int httpCode = http.GET();
	if(httpCode > 0){
	    String payload = http.getString();
	    return payload;
	}else{return "error "+httpcode;}
}
