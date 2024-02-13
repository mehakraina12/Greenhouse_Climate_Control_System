#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

String URL = "http://192.168.43.237/weather_system/test.php";

const char* ssid = "Neha Miglani"; 
const char* password = "123456789"; 


void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  
  connectWiFi();
}

void loop() {
  // put your main code here, to run repeatedly:
  if(WiFi.status() != WL_CONNECTED) {
    connectWiFi();
  }
  float temp = random(200, 400) / 10.0;
  String postData = URL + "?temp=" + String(temp);
  
  WiFiClient client;
  HTTPClient http;
  http.begin(client, postData);

   int httpCode = http.GET();
   String payload = http.getString();

   Serial.print("URL : "); Serial.println(URL); 
  Serial.print("Data: "); Serial.println(postData);
  Serial.print("httpCode: "); Serial.println(httpCode);
  Serial.print("payload : "); Serial.println(payload);
  Serial.println("--------------------------------------------------");
  delay(5000);

}

void connectWiFi() {
  WiFi.mode(WIFI_OFF);
  delay(1000);
  //This line hides the viewing of ESP as wifi hotspot
  WiFi.mode(WIFI_STA);
  
  WiFi.begin(ssid, password);
  Serial.println("Connecting to WiFi");
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(30000);
    Serial.print(".");
  }
    
  Serial.print("connected to : "); Serial.println(ssid);
  Serial.print("IP address: "); Serial.println(WiFi.localIP());
}
