<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Appointment Booking</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url(https://t3.ftcdn.net/jpg/02/16/47/22/360_F_216472247_cT66WDoS0fp1s3wC7eaykMJNDGVbOBPq.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .header {
            text-align: center;
            color: white;
        }

        .booksub {
            text-align: center;
        }

        .keys {
            margin-bottom: 20px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        .slot {
            margin: 5px;
        }

        .slot.unavailable {
            background-color:#93999c;
            border: solid black;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3>Appointments now made easier</h3>
    </div>
    <br><br>
    <div class="book">
        <center>
            <div class="booksub">
                <label>choose your date</label>
                <br>
                <input type="date">
            </div>
            <div class="booksub" id="slotContainer">
                <div class="keys">
                    <span class="dot" style="background-color: white;"></span>
                    <h6>available</h6>
                    <span class="dot" style="background-color:#93999c;"></span>
                    <h6>unavailable</h6>
                </div>
                <br>
                <label>choose your slot</label>
                <button class="slot" onclick="incrementCount(this)"><p>8.00am-10.00am</p></button>
                <button class="slot" onclick="incrementCount(this)"><p>10.00am-12.00pm</p></button>
                <button class="slot" onclick="incrementCount(this)"><p>12.00pm-2.00pm</p></button>
                <button class="slot" onclick="incrementCount(this)"><p>03.00pm-05.00pm</p></button>
                <button class="slot" onclick="incrementCount(this)"><p>05.00pm-07.00pm</p></button>
            </div> 
            <br>
        </center>
    </div>

    <script>
        function incrementCount(button) {
            var count = localStorage.getItem(button.innerText) || 0;
            count++;
            localStorage.setItem(button.innerText, count);

            if (count >= 3) {
                button.classList.add('unavailable');
                button.setAttribute('disabled', 'disabled');
            }

            var appointmentNumber = count;
            var appointmentMessage = 'Your appointment has been successfully booked. Your appointment number is ' + appointmentNumber + '.';
            alert(appointmentMessage);
        }

        document.querySelectorAll('.slot').forEach(function(button) {
            var count = localStorage.getItem(button.innerText) || 0;
            if (count >= 3) {
                button.classList.add('unavailable');
                button.setAttribute('disabled', 'disabled');
            }
        });

        function resetAvailability() {
            document.querySelectorAll('.slot').forEach(function(button) {
                button.classList.remove('unavailable');
                button.removeAttribute('disabled');
                localStorage.removeItem(button.innerText);
            });
        }
    </script>
</body> 
</html>
