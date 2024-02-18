from gevent import monkey
monkey.patch_all()
import face_recognition
import cv2
import numpy as np 
import csv
import os
from datetime import datetime
import mysql.connector
from flask import Flask, render_template
from flask import jsonify, request
import webbrowser
from flask_socketio import SocketIO  
import time

app = Flask(__name__)
socketio = SocketIO(app)
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="user_db"
)
cursor = db.cursor()

# Fetch names and image paths from the database
cursor.execute("SELECT user_name, Image_link FROM patient")
result = cursor.fetchall()
known_face_name = [row[0] for row in result]
known_face_image_paths = [row[1] for row in result]

known_face_encoding = []
for path in known_face_image_paths:
    img = face_recognition.load_image_file(path)
    enc = face_recognition.face_encodings(img)[0]
    known_face_encoding.append(enc)

patients = known_face_name.copy()
arrived_patients = known_face_name.copy()
schedule = []

face_locations = []
face_encodings = []
face_names = []
s = True
now = datetime.now()
current_date = now.strftime("%Y-%m-%d")
f = open(current_date + '.csv', 'w+', newline='')
lnwriter = csv.writer(f)

vc = cv2.VideoCapture(0)
i = 0

def update_schedule(name):
    global schedule, arrived_patients
    schedule.append(name)
    arrived_patients.remove(name)
    schedule.sort(key=lambda x: arrived_patients.index(x) if x in arrived_patients else float('inf'))

def scheduling():
    global schedule

    while True:
        _, frame = vc.read()

        small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)
        rgb_small_frame = small_frame[:, :, ::-1]

        if s:
            face_locations = face_recognition.face_locations(rgb_small_frame)
            face_encodings = face_recognition.face_encodings(rgb_small_frame, face_locations)
            frame_names = []

            for face_encoding in face_encodings:
                matches = face_recognition.compare_faces(known_face_encoding, face_encoding)
                name = ""
                face_distance = face_recognition.face_distance(known_face_encoding, face_encoding)
                best_match_index = np.argmin(face_distance)

                if matches[best_match_index]:
                    name = known_face_name[best_match_index]
                frame_names.append(name)

                if name in known_face_name and name in arrived_patients and name not in schedule:
                    
                    schedule.append(name)
                    schedule.sort(key=lambda x: arrived_patients.index(x))
                    print("schedule (updated):", schedule)
                    current_time = now.strftime("%H-%M-%S")
                    lnwriter.writerow([name, current_date, current_time])

        cv2.imshow("hi", frame)
        k = cv2.waitKey(1)
        if k == ord('q'):
            break

    vc.release()

scheduling()
cv2.destroyAllWindows()
f.close()

def get_current_patient():
    if schedule:
        return schedule[0]
    else:
        return None
    
@app.route('/')
def home():
    current_patient = get_current_patient()
    
    if 'Mobile' in request.headers.get('User-Agent'):
        return render_template('patient_mobile.html', current_patient=current_patient)
    else:
        return render_template('doctor.html', current_patient=current_patient)


@app.route('/next_patient', methods=['POST'])
def next_patient():
    if schedule:
        next_patient = schedule.pop(0)
        return jsonify({'success': True, 'next_patient': next_patient})
    else:
        return jsonify({'success': False, 'message': 'No more patients in the schedule'})

@app.route('/start_scheduling', methods=['POST'])
def start_scheduling():
    global s
    s = True  
    return jsonify({'success': True, 'message': 'Scheduling started successfully'})
@app.route('/patient_mobile')
def patient_mobile():
    return render_template('patient_mobile.html')
@app.route('/get_current_patient')
def get_current_patient_api():
    current_patient = get_current_patient()
    return jsonify({'current_patient': current_patient})
def open_browser():
    webbrowser.open('http://10.5.27.176:5000/', new=2)
import threading
if __name__ == '__main__':
    flask_thread = threading.Thread(target=socketio.run, args=(app,), kwargs={'host': '10.5.27.176', 'port': 5000, 'debug': True})
    flask_thread.start()
    socketio.sleep(2)
    open_browser()
    flask_thread.join()
