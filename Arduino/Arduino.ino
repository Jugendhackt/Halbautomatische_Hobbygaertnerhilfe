#include <Servo.h>
#include <ESP8266WebServer.h>
#include <Wire.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_BME280.h>
#include "config.h"

#define SEALEVELPRESSURE_HPA (1013.25)

Adafruit_BME280 bme;

float temperature, humidity, pressure, altitude, Light, Bodenfeuchte;

/*Put your SSID & Password*/


int MUXPinS0 = D7;
int MUXPinS1 = D6;
int MUXPinS2 = D5;
int MUXPinS3 = D4;
int LEDPin = D3;

ESP8266WebServer server(80);
Servo myservo;

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
  Serial.print("Got IP: ");
  Serial.println(WiFi.localIP());

  server.on("/", handle_OnConnect);
  server.onNotFound(handle_NotFound);

  server.begin();
  Serial.println("HTTP server started");

  myservo.attach(15);
  pinMode(MUXPinS0, OUTPUT);
  pinMode(MUXPinS1, OUTPUT);
  pinMode(MUXPinS2, OUTPUT);
  pinMode(MUXPinS3, OUTPUT);
  pinMode(LEDPin,OUTPUT);
}
void loop() {
  server.handleClient();
   }

void handle_OnConnect() {
  temperature = bme.readTemperature();
  humidity = bme.readHumidity();
  pressure = bme.readPressure() / 100.0F;
  altitude = bme.readAltitude(SEALEVELPRESSURE_HPA);
  Bodenfeuchte = getAnalog(2);
  Light = getAnalog(1);
  server.send(200, "text/html", SendHTML(temperature, humidity, pressure, altitude, Light, Bodenfeuchte));
    if (Light > 600){ //Dunkel ist wenn der Wert hoch ist
    digitalWrite(LEDPin,HIGH);
   }else{
    digitalWrite(LEDPin,LOW);
   }
   if (Bodenfeuchte>700){
    myservo.write(180);
   delay(5000); 
   myservo.write(90);
   }
}


float getAnalog(int MUXyPin) {
  digitalWrite(MUXPinS3, HIGH && (MUXyPin & B00001000));
  digitalWrite(MUXPinS2, HIGH && (MUXyPin & B00000100));
  digitalWrite(MUXPinS1, HIGH && (MUXyPin & B00000010));
  digitalWrite(MUXPinS0, HIGH && (MUXyPin & B00000001));
  return (float)analogRead(A0);
}


void handle_NotFound() {
  server.send(404, "text/plain", "Not found");
}

String SendHTML(float temperature, float humidity, float pressure, float altitude, float Light, float Bodenfeuchte) {
  String ptr = "<!DOCTYPE html> <html>\n";
  ptr += "<head>";
  ptr += "<title>Stationsdaten</title>";
  ptr += "<meta name='author' content='Niclas'>";
  ptr += "<meta name='editor' content='html-editor phase 5'>";
  ptr += "</head>";
  ptr += "<body>";
  ptr += "<a href='http://10.59.1.166/'>Neuladen</a>";
  ptr += "<table bgcolor='green' border width=100% height='600px'>";
  ptr += "<tr><th width='16,6%'>Was?</th><th width='16,6%'>Temperatur</th><th width='16,6%'>Luftfeuchtigkeit</th><th width='16,6%'>Bodenfeuchtigkeit</th><th width='16,6%'>Luftdruck</th><th>Helligkeit</th></tr>";
  ptr += "<tr><th width='16,6%'>Letzte Messung</th><th width='16,6%'>"; ptr += temperature; ptr += " &deg;C</th><th width='16,6%'>"; ptr += humidity; ptr += " %</th><th width='16,6%'>"; ptr += Bodenfeuchte; ptr += "</th><th width='16,6%'>"; ptr += pressure / 100; ptr += "</th><th width='16,6%'>"; ptr += Light; ptr += "</th></tr>";
  ptr += "</table>";
  ptr += "</body>";
  ptr += "</body>";
  return ptr;
}
