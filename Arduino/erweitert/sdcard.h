//https://www.arduino.cc/en/Reference/SD

#include "SPI.h"
#include "SD_MMC.h"
#include <Arduino_JSON.h>
uint8_t cardtype;
bool reader=false;
uint64_t cardSize;
#define confpath "/config.json"
JSONVar conf;

void sd_init(){
    if(!SD_MMC.begin()){
        return("Card Mount Failed");
    }
    reader=true;
    cardtype=SD_MMC.cardType();
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
    iF(!SD_MMC.exists(confpath)){
        return;
    }
    String conf=sd_read(confpath);
    String temp=conf;
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

String sd_read(String path) {
if(cardtype==CARD_NONE||reader==false){
    return;
}
iF(!SD_MMC.exists(path)){
    return;
}
File file=SD_MMC.open(path)
if(!file)return;
String received = ""; char ch; 
while (file.available()) {

ch = file.read();

received += ch; } return String(received); }

void write(String path, String dataString){
File dataFile = SD_MMC.open(path, FILE_WRITE);
if (dataFile) {
  dataFile.println(dataString);
  dataFile.close();
}else{
}
}

String * listDir(const char * dirname, uint8_t levels){
  String r[];
  if(cardtype==CARD_NONE||reader==false){
    return r;
  }
  File root = SD_MMC.open(dirname);
  if(!root){
    return r;
  }
  if(!root.isDirectory()){
    return r;
  }

  File file = root.openNextFile();
  while(file){
    if(file.isDirectory()){
      file.name() >> r;
      if(levels){
        listDir(fs, file.name(), levels -1);
      }
    } else {
      file.name() >> r;
    }
    file = root.openNextFile();
  }
}
