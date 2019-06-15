import time
                                            # Das ist das lesen der Datei
Temperatur = open("Temperatur.txt", "r")
temp = Temperatur.readline()
Temperatur.close()
temp2 = open("Temperatur.txt").read()
Luftdruck = open("Luftdruck.txt", "r")
luftdr = Luftdruck.readline()
Luftdruck.close()
Luftfeuchtigkeit = open("Luftfeuchtigkeit.txt", "r")
luftfe = Luftfeuchtigkeit.readline()
Luftfeuchtigkeit.close()
Bodenfeuchtigkeit = open("Bodenfeuchtigkeit.txt", "r")
boden = Bodenfeuchtigkeit.readline()
Bodenfeuchtigkeit.close()
Helligkeit = open("Helligkeit.txt", "r")
helli = Helligkeit.readline()
Helligkeit.close()





                                      #   temp, luftdr, luftfe, boden, helli

while True:
    web = open("Server.html").read()
    #a = web.read()
    #web.close()
    web = web.replace("[[temp]]", temp)
    web = web.replace("[[luftdr]]", luftdr)
    web = web.replace("[[luftfe]]", luftfe)
    web = web.replace("[[boden]]", boden)
    web = web.replace("[[helli]]", helli)
    file = open("Website.html", "w")
    file.write(web)
    
    time.sleep(10)
