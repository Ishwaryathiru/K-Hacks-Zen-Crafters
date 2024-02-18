#include <SPI.h>
#include <Wire.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>
#include <MFRC522.h>

#define RST_PIN 49
#define SS_PIN 53

MFRC522 mfrc522(SS_PIN, RST_PIN);
Adafruit_SSD1306 display(4);

int scanCount = 0;

void setup() {
  Serial.begin(9600);
  SPI.begin();
  display.begin(SSD1306_SWITCHCAPVCC, 0x3C);
  mfrc522.PCD_Init();
  Serial.println("RFID Detection with Arduino Mega 2560");
}

void loop() {
  if (mfrc522.PICC_IsNewCardPresent()) {
    if (mfrc522.PICC_ReadCardSerial()) {
      Serial.println("Card detected!");
      scanCount++;
      display.clearDisplay();
      display.setTextColor(SSD1306_WHITE);
      display.setTextSize(1);
      display.setCursor(0, 0);

      if (scanCount % 2 == 1) {
        display.print("Doctor in");
      } else {
        display.print("Doctor out");
      }

      display.display();

      mfrc522.PICC_HaltA();
      mfrc522.PCD_StopCrypto1();
    }
  }
  delay(1000); 
}