#include "sd_card.h"
#include "webserver.h"
#include "HumiPedia.h"
#include "config.h"
#include "gpio.h"


void setup(){
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
}

void loop(){
web_loop();
}
