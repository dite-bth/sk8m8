#include "InternetButton.h"
#include "math.h"
InternetButton b = InternetButton();

double xValue;
double yValue;
double zValue;
char dataChars[32];
String data;
int dataOnline[10] = {10, 11, 12, 13, 14, 15, 16};
int i = 0;

void setup() {
    b.begin();
    Particle.variable("getData", &data, STRING);
    Serial.begin(9600);
}



void loop(){

    xValue = b.readX();
    yValue = b.readY();
    zValue = b.readZ();

    data = String("{" + String(zValue) + "}" + String(zValue) + " , " );       //FÖR ATT PRINTA UT ONLINE

  /*  Serial.print("x: ");
    Serial.println(xValue);
    Serial.print("y: ");
    Serial.println(yValue);*/
    Serial.print("z: ");
    Serial.println(zValue);
    Serial.println("");

    b.allLedsOn(abs(xValue), abs(yValue), abs(zValue));

    delay(50);

    //i++;
}
