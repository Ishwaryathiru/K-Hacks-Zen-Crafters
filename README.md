*Hospital Appointment Booking System*
This project implements a Hospital Appointment Booking System using Flask, Arduino Mega 2560, RFID scanner, and OLED display. The system allows doctors to manage their schedule, and patients to book appointments conveniently.

*Requirements*
Arduino Mega 2560
RFID Scanner
OLED Display
Flask (Python Web Framework)
OpenCV, face_recognition, gevent, MySQL Connector, Flask-SocketIO (Python Libraries)
HTML, CSS, JavaScript
jQuery (for AJAX)
Arduino Libraries: SPI, Wire, Adafruit_GFX, Adafruit_SSD1306, MFRC522
Folder Structure
*Arduino Code:*

Arduino code for RFID detection and display control is provided in the Arduino script.
Flask Web Application:

facerecogai.py - Main Flask application with routes and logic.
templates/doctor.html - HTML template for doctor's schedule management.
uploads/ - Folder to store patient images.
Arduino Setup
Connect Arduino Mega 2560 with RFID Scanner and OLED display.
Upload the Arduino script provided (RFID.ino) to the Arduino Mega 2560.
Python Setup
Install required Python libraries using the following:
pip install face_recognition opencv-python gevent Flask Flask-SocketIO mysql-connector-python

Set up a MySQL database named user_db with tables for patient_login and patient. Update the database configuration in the facerecogai.py file.

Ensure the Arduino is connected, and the COM port is configured correctly in the Arduino script.

Running the Application
Execute the Flask application:
python facerecogai.py
Open a web browser and navigate to http://localhost:5000/ to access the main application.

The doctor can manage the schedule, and patients can book appointments through the web interface.

*Doctor's Schedule Management*
The doctor's schedule can be managed using the doctor.html interface.
The doctor's availability is updated based on RFID card detection.
Patient Appointment Booking
Patients can access the booking system through the main page.
They can choose the date and available time slots for appointment booking.
Acknowledgments
The completion of this project, titled "Hospital Appointment Booking System," by Zen Crafters for KHacks 2024, was made possible through the collaborative efforts of the team members.
