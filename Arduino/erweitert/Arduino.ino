#include "sd_card.h"
#include "webserver.h"
#include "HumiPedia.h"
#include "config.h"
#include "gpio.h"

bool error=false;

#ifndef ssid
error=true;
#endif

#ifndef password
error=true;
#endif

void setup(){
  Serial.begin(9600);
  if(error==false){
    Serial.println("Connecting to ");
    Serial.println(ssid);

    //connect to your local wi-fi network
    WiFi.begin(ssid, password);

    //check wi-fi is connected to wi-fi network
    while (WiFi.status() != WL_CONNECTED) {
      delay(1000);
      Serial.print(".");
    }
    sd_init();
    gpio_init();
    web_init();
  }else{
    error_init();
    pinMode(13,OUTPUT)
    Serial.println("Fail with default data");
  }
}

void loop(){
  if(error==false){
    web_loop();
  }else{
    digitalWrite(13, HIGH);
    delay(1000);
    digitalWrite(13, LOW);
    delay(1000);
  }
  delay(1000);
}
