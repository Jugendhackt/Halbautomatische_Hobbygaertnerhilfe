#include <Servo.h>

int MUXPinS0 = D7;
int MUXPinS1 = D6;
int MUXPinS2 = D5;
int MUXPinS3 = D4;

Servo myservo;

void gpio_init(){
  pinMode(MUXPinS0, OUTPUT);
  pinMode(MUXPinS1, OUTPUT);
  pinMode(MUXPinS2, OUTPUT);
  pinMode(MUXPinS3, OUTPUT);
}

float getAnalog(int MUXyPin) {
  digitalWrite(MUXPinS3, HIGH && (MUXyPin & B00001000));
  digitalWrite(MUXPinS2, HIGH && (MUXyPin & B00000100));
  digitalWrite(MUXPinS1, HIGH && (MUXyPin & B00000010));
  digitalWrite(MUXPinS0, HIGH && (MUXyPin & B00000001));
  return (float)analogRead(A0);
}
