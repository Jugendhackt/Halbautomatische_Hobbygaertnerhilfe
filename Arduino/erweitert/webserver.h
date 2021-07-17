#include <ESP8266WebServer.h>
void web_init(){
  server.on("/", handle_OnConnect);
  server.onNotFound(handle_NotFound);

  server.begin();
  Serial.println("HTTP server started");
}

void handle_OnConnect(){}

void handle_NotFound(){}
