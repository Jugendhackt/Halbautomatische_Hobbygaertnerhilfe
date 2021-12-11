//#include <ESP8266WebServer.h>
#include <ESPAsyncWebServer.h>

//ESP8266WebServer server(80);
AsyncWebServer server(80);
AsyncWebSocket ws("/ws");

void web_init(){
  server.serveStatic("/", SPIFFS, "/server/").setDefaultFile("index.html");
  server.onNotFound([](AsyncWebServerRequest *request){
    request->send(404);
  });
  ws.onEvent(onWsEvent);
  server.addHandler(&ws);
  server.begin();
}
int clock;

void onWsEvent(AsyncWebSocket * server, AsyncWebSocketClient * client, AwsEventType type, void * arg, uint8_t *data, size_t len){
 
  if(type == WS_EVT_CONNECT){
 
    Serial.println("Websocket client connection received");
    client->text("clock:"+String(clock));
 
  } else if(type == WS_EVT_DISCONNECT){
    Serial.println("Client disconnected");
 
  } else if(type == WS_EVT_ERROR){
    Serial.print("ws");
    Serial.print(server->url());
    erial.print("error", client->id(),": ", *((uint16_t*)arg), (char*)data));
  } else if(type==WS_EVT_DATA){
    
  }
}

void c(){
  request->send(200,"text/html",String(clock))
}

void sc(data){
  String temp=server.arg("clock");
  int i
  for(i=0;i<temp.length;i++){if(!isDigit(temp.charAt(i))return;}
  clock=toInt(temp);
}

void web_loop(){server.handleClient();clock++;}
