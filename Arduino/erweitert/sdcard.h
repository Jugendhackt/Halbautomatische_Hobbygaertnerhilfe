//https://www.arduino.cc/en/Reference/SD
#include "SD.h"
#include <Arduino_JSON.h>
uint8_t cardtype;
bool reader=false;
uint64_t cardSize;
#define confpath "/config.json"
JSONVar conf;

void init(){
    if(!SD.begin()){
        return("Card Mount Failed");
    }
    reader=true;
    cardtype=SD.cardType();
        if(cardType == CARD_NONE){
        return("No SD card attached");
    }
    cardSize = SD.cardSize();
}

JSONVar readConfig(String Key){
    //Read SD-Card
    if(cardtype==CARD_NONE||reader==false){
        return;
    }
    iF(!SD.exists(confpath)){
        return;
    }
    File conf=SD.open(confpath);
    if(!conf){
        return;
    }
    String temp=File.read();
    conf=JSON.parse(temp);
    if (JSON.typeof(myObject) == "undefined") {
        return;
    }
    int lastIndex = 0;int counter = 0;String Keys[]=[];
    for (int i = 0; i < Key.length(); i++) {
        if (Key.substring(i, i+1) == ",") {
          Keys[counter] = Key.substring(lastIndex, i);
          lastIndex = i + 1;
          counter++;
        }
    }
    JSONVar temp=conf;
    for(int i=0;i<Keys.length();i++){
        if(temp.hasOwnProperty(Keys[i])){
            temp=temp[Keys[i]]
        }else{
            
        }
    }
    return temp;
}
