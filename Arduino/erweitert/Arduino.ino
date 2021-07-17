#include "sd_card.h"
#include "webserver.h"
#include "HumiPedia.h"

void setup(){
sd_init();
web_init();
}

void loop(){
web_loop();
}
