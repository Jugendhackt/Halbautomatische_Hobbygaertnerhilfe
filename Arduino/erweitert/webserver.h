#include <ESP8266WebServer.h>

ESP8266WebServer server(80);

void web_init(){
  server.on("/", handle_OnConnect);
  server.onNotFound(handle_NotFound);
  server.on("/clock",c);
  server.on("/setclock",HTTP_PUT,sc);
  server.begin();
}
int clock;
void c(){
  server.send(200,"text/html",String(clock))
}

void sc(){
  String temp=server.arg("clock");
  int i
  for(i=0;i<temp.length;i++){if(!isDigit(temp.charAt(i))return;}
  clock=toInt(temp);
}

void web_loop(){server.handleClient();clock++;}

void handle_OnConnect(){
  html=sd_read('/index.html')||'<html></html>';
  server.send(200, "text/html", html);
}

void handle_NotFound() {
  server.send(404, "text/plain", "Not found");
}

