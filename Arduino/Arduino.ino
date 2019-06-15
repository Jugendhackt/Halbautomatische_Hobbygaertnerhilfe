#include <ESP8266WebServer.h>
#include <Wire.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_BME280.h>

#define SEALEVELPRESSURE_HPA (1013.25)

Adafruit_BME280 bme;

float temperature, humidity, pressure, altitude;

/*Put your SSID & Password*/
const char* ssid = "JugendHackt";  // Enter SSID here
const char* password = "";  //Enter Password here

ESP8266WebServer server(80);              
 
void setup() {
  Serial.begin(115200);
  delay(100);
  
  bme.begin(0x76);   

  Serial.println("Connecting to ");
  Serial.println(ssid);

  //connect to your local wi-fi network
  WiFi.begin(ssid, password);

  //check wi-fi is connected to wi-fi network
  while (WiFi.status() != WL_CONNECTED) {
  delay(1000);
  Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected..!");
  Serial.print("Got IP: ");  Serial.println(WiFi.localIP());

  server.on("/", handle_OnConnect);
  server.onNotFound(handle_NotFound);

  server.begin();
  Serial.println("HTTP server started");

}
void loop() {
  server.handleClient();
}

void handle_OnConnect() {
  temperature = bme.readTemperature();
  humidity = bme.readHumidity();
  pressure = bme.readPressure() / 100.0F;
  altitude = bme.readAltitude(SEALEVELPRESSURE_HPA);
  server.send(200, "text/html", SendHTML(temperature,humidity,pressure,altitude)); 
}

void handle_NotFound(){
  server.send(404, "text/plain", "Not found");
}

String SendHTML(float temperature,float humidity,float pressure,float altitude){
  String ptr = "<!DOCTYPE html> <html>\n";
  ptr +="<head>";
  ptr +="<title>Stationsdaten</title>";
  ptr +="<meta name='author' content='Niclas'>";
  ptr +="<meta name='editor' content='html-editor phase 5'>";
  ptr +="</head>";
  ptr +="<body>";
  ptr +="<a>Bei Aktualisierung Neuladen</a>";
  ptr +="<table bgcolor='green' border width=100% height='600px'>";
  ptr +="<tr><th width='16,6%'>Wann?</th><th width='16,6%'>Temperatur</th><th width='16,6%'>Luftfeuchtigkeit</th><th width='16,6%'>Bodenfeuchtigkeit</th><th width='16,6%'>Luftdruck</th><th>Helligkeit</th></tr>";
  ptr +="<tr><th width='16,6%'>Letzte Messung</th><th width='16,6%'>123</th><th width='16,6%'>1</th><th width='16,6%'>1</th><th width='16,6%'>1</th><th>1</th></tr>";
  ptr +="</table>";
  ptr +="</body>";
  ptr +="</body>";
  return ptr;

}
