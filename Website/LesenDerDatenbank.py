import time
#   temp, luftdr, luftfe, boden, helli

while True:
    Temperatur = open("Temperatur.txt", "r")
    temp = Temperatur.readline()
    Temperatur.close()
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
    web = open("Server.html").read()
    web = web.replace("[[temp]]", temp)
    web = web.replace("[[luftdr]]", luftdr)
    web = web.replace("[[luftfe]]", luftfe)
    web = web.replace("[[boden]]", boden)
    web = web.replace("[[helli]]", helli)
    file = open("Website.html", "w")
    file.write(web)
    
    time.sleep(10)
