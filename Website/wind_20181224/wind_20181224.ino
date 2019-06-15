#include <Ethernet.h>
#include "avr/wdt.h"

bool connected = false;
 
byte mac[] = { 0x90, 0xA2, 0xDA, 0x00, 0x22, 0x82};
byte serverIP[] = {123,123,123,123}; // Server IP Addresse
 
EthernetClient client;

char server[] = "onlinewetter.bplaced.net";

int sensorPin = 19; //Pin für Hallsensor Windgeschwindigkeit
int counter = 0;
float start, finished;
float elapsed, time;
float revs;
float revolution;
unsigned long previousMillis = 0; // speichert wie viele Sekunden seit der letzten Änderung vergangen sind
unsigned long interval = 10000;    // Interval zwischen zwei Änderungen

// Konstanten: Nummern der Pins für die Hall-Sensoren
const int hallPinNno = 29;  // 22,5° 
const int hallPinOno = 31;   // 67,5°
const int hallPinOso = 33;  // 112,5°
const int hallPinSso = 35;   // 157,5°
const int hallPinSsw = 37;  // 202,5°
const int hallPinWsw = 39;   // 247,5°
const int hallPinWnw = 41;  // 292,5°
const int hallPinNnw = 43;   // 337,5°

// Variablen: Status der Hall-Sensoren 
int hallStateNno = 0;          
int hallStateOno = 0;
int hallStateOso = 0;
int hallStateSso = 0;          
int hallStateSsw = 0;
int hallStateWsw = 0;
int hallStateWnw = 0;          
int hallStateNnw = 0;


void setup() 
{
wdt_enable(WDTO_8S);     //8 s  
Serial.begin (9600);
Ethernet.begin(mac); // no IP => DHCP

   // Initialisieren der Hall-Sensoren als Input:
pinMode(hallPinNno, INPUT);
pinMode(hallPinOno, INPUT);
pinMode(hallPinOso, INPUT);   
pinMode(hallPinSso, INPUT);
pinMode(hallPinSsw, INPUT);
pinMode(hallPinWsw, INPUT);   
pinMode(hallPinWnw, INPUT);
pinMode(hallPinNnw, INPUT);
  
  
  
  
  pinMode(sensorPin, INPUT);
  
  attachInterrupt(4, RPM, RISING);
  start=millis();
  
 
  
}

void RPM() //++++++++++++++++++++++++++ Abschnitt Windgeschwindigkeit ++++++++++++++++++++++++++++++++++
{
  int sensorValue = digitalRead(sensorPin);

  elapsed=millis()-start;
  start=millis();
  float revs = 60000/elapsed;
  float revolution = elapsed/1000;
  //Serial.print(revs/3 ,0); //für Testzwecke
  //Serial.print(" RPM ");
  //Serial.println();
{
if (millis() - previousMillis > interval) {
    previousMillis = millis();   // aktuelle Zeit abspeichern
    
client.connect(server, 80);
//if (client.connect(server, 80))
   if (elapsed > 10000)
{client.print("GET /eintrag_wind.php?ms=");
client.print(0, 2);
client.print("&kmh=");
client.print(0, 1);}
  else
{client.print("GET /eintrag_wind.php?ms=");
client.print((revs/45), 2);
client.print("&kmh=");
client.print((revs/45*3.6), 1);}
client.println(" HTTP/1.1");
client.print("Host: ");
client.println(server);
client.println("Connection: close");
client.println();
client.stop(); 
}
}
} 

void loop() 

{
Serial.print("Stand: 24.12.2018");  
elapsed=millis()-start;
  
 counter++;
 int sensorValue = digitalRead(sensorPin);
    
  // Wartezeit zwischen 2 Messungen
  delay(5000);

//+++++++++++++++++++++++++++++++ Windrichtung ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


// Status der einzelnen Hallsensoren auslesen
  delay(5);
hallStateNno = digitalRead(hallPinNno);
  //delay(5);
hallStateOno = digitalRead(hallPinOno);
  //delay(5);
hallStateOso = digitalRead(hallPinOso);
  //delay(5);
hallStateSso = digitalRead(hallPinSso);
  //delay(5);
hallStateSsw = digitalRead(hallPinSsw);
  //delay(5);
hallStateWsw = digitalRead(hallPinWsw);
  //delay(5);
hallStateWnw = digitalRead(hallPinWnw);
  //delay(5);
hallStateNnw = digitalRead(hallPinNnw);
  delay(5);
 
   
//+++++++++++++++++++++++++++++++++ mysql +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     
if (client.connect(server, 80)) 
{
client.print("GET /eintrag_richtung.php?Nno=");
client.print(hallStateNno);
client.print("&Ono=");
client.print(hallStateOno);
client.print("&Oso=");
client.print(hallStateOso);
client.print("&Sso=");
client.print(hallStateSso);
client.print("&Ssw=");
client.print(hallStateSsw);
client.print("&Wsw=");
client.print(hallStateWsw);
client.print("&Wnw=");
client.print(hallStateWnw);
client.print("&Nnw=");
client.print(hallStateNnw);
client.println(" HTTP/1.1");
client.print("Host: ");
client.println(server);
client.println("Connection: close");
client.println();
 client.stop();

 wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(2000);  // Pause für 4 Sekunden
wdt_reset();
 } 
 }
 




