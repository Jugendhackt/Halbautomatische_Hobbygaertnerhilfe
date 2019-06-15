#include "avr/wdt.h"
#include "cactus_io_BME280_I2C.h"
#include <Wire.h>
#include <Adafruit_Sensor.h>
#include <Ethernet.h>
BME280_I2C bme(0x77);  // I2C address = 0x76

bool connected = false;
byte mac[] = { 0x90, 0xA2, 0xDA, 0x00, 0x22, 0x81};
byte serverIP[] = {123,123,123,123}; // Server IP Addresse
EthernetClient client;
char server[] = "onlinewetter.bplaced.net";

int analogPin = 8; 
int regen = 0;

void setup() 
{
Serial.begin (9600);
Ethernet.begin(mac); // no IP => DHCP
pinMode(7, OUTPUT);
digitalWrite(7, HIGH);
bme.begin();
wdt_enable(WDTO_8S);     //8 s
}

void loop() 
{ 
Serial.print("Stand: 24.03.2019");
regen=analogRead(analogPin);
  
if (regen > 90)    
{digitalWrite(7, LOW);} //An dieser Stelle würde das Relais einsschalten
else
{digitalWrite(7, HIGH);} //Und wieder ausschalten
{
 
  bme.readSensor();
 
//+++++++++++++++++++++++++++++++++ mysql +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
   
client.connect(server, 80); 
client.print("GET /eintrag_wetter.php?T=");
client.print(bme.getTemperature_C()-0.5);
client.print("&h=");
client.print(bme.getHumidity());
client.print("&p0=");
client.print(((bme.getPressure_HP() / 100)-1)*1.0052);
if (regen > 90)
{client.print("&regen=");
client.print(regen-90);}
else 
{client.print("&regen=");
client.print(0);}
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
delay(4000);  // Pause für 4 Sekunden
wdt_reset();
delay(3500);  // Pause für 4 Sekunden
 
}
}
 
 
