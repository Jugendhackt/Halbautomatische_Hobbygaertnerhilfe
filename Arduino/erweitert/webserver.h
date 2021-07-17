#include <ESP8266WebServer.h>

ESP8266WebServer server(80);

void web_init(){
  server.on("/", handle_OnConnect);
  server.onNotFound(handle_NotFound);

  server.begin();
}

void web_loop(){server.handleClient();}

void handle_OnConnect(){

}

void handle_NotFound(){}
