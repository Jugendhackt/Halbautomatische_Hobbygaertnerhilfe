#include "sd_card.h"
#include "webserver.h"
#include "HumiPedia.h"
#include "config.h"
#include "gpio.h"

int MUXPinS0 = D7;
int MUXPinS1 = D6;
int MUXPinS2 = D5;
int MUXPinS3 = D4;

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
gpio_init();
sd_init();
web_init();
}

void loop(){
web_loop();
}
