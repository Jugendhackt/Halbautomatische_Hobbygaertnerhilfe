#include "cactus_io_BME280_I2C.h"
#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <Adafruit_Sensor.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <Wire.h>
#define CYCLE 10000

BME280_I2C bme(0x77);  // I2C address = 0x76

const char* host = "onlinewetter.bplaced.net";
unsigned long value = 0;
unsigned int lastcall = CYCLE;
int conn_time;
const int sleepTimeS = 53;
int analogPin = A0; 
int regen = 0;

ESP8266WiFiMulti WiFiMulti;

void setup() {
pinMode(14, OUTPUT);
pinMode(13, OUTPUT);
digitalWrite(13, HIGH);
  Serial.begin(115200);
  bme.begin();

  Serial.println();
  Serial.println();
  Serial.println();

  for (uint8_t t = 4; t > 0; t--) {
    Serial.printf("[SETUP] WAIT %d...\n", t);
    Serial.flush();
    delay(1000);
  }

   WiFi.mode(WIFI_STA);
  WiFi.begin("Fritz", "DNidL47infu.");

}
void loop() 
{
Serial.println("Stand: 13.06.2019");
regen=analogRead(analogPin);
  
if (regen > 90)    
{digitalWrite(7, LOW);} //An dieser Stelle würde das Relais einsschalten
else
{digitalWrite(7, HIGH);} //Und wieder ausschalten  

{  bme.readSensor(); 

  Serial.print("Temperature = ");
  Serial.print(bme.getTemperature_C());
  Serial.println(" Celsius");
  Serial.print("Pressure = ");
  Serial.print(bme.getPressure_HP());
  Serial.println(" Pa auf Höhe Baumgarten (44 m über NN)");
  Serial.print("Feuchtigkeit : "); 
  Serial.print(bme.getHumidity());
  Serial.println("%");
  Serial.println(" ");
  
  Serial.print("connecting to ");
  Serial.println(host);
  
  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  const int httpPort = 80;

  delay(500);
  
  if (!client.connect(host, httpPort)) 
  {
    Serial.println("connection failed");
    return;
  }
 
  // We now create a URI for the request
  String url = "/eintrag_wetter.php";
  url += "?T=";
  url += (bme.getTemperature_C());
  url += "&p0=";
  url += (((bme.getPressure_HP() / 100)-1)*1.0052);
  url += "&h=";
  url += (bme.getHumidity());
   url += "&regen=";
  url += (regen-8);
  
  Serial.print("Requesting URL: ");
  Serial.println(url);
 
  // This will send the request to the server
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
  delay(500);
 
  // Read all the lines of the reply from server and print them to Serial
  while (client.available()) {
    String line = client.readStringUntil('\r');
    Serial.print(line);
  }
  client.stop();
  Serial.println();
  Serial.println("closing connection");

  // Sleep
Serial.println("ESP8266 in sleep mode");
ESP.deepSleep(sleepTimeS * 1000000);
}}
