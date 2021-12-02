<form action="" id="popForm">
    <div class="popupbooking" id="popup-1booking">
        <div class="overlaybooking" onclick="togglePopupBooking()"></div>
        <div class="contentbooking">
            <div class="close-btn-dotbooking" onclick="togglePopupBooking()">...</div>
            <div class="close-btnbooking" onclick="togglePopupBooking()">-</div>
            <p style="margin-bottom: 15px;margin-top: 20px">Lorem Ipsum is simply dummy text of the printing
                and typesetting industry.
            </p>
            <span class="footerleft-content-social"><img src="./img/viber.png" class="imgsocial" alt=""></span>
            <span class="footerleft-content-social"><img src="./img/facebook-app-logo.png" class="imgsocial"
                    alt=""></span>
            <span class="footerleft-content-social"><img src="./img/line.png" class="imgsocial" alt=""></span>
            <div class="calendarcenter">
                <?php include('./testcalendar.php') ?>
            </div>
            <div class="row test1234">
                <div class="col-6">
                    <input type="text" name="Name" id="namepop" required placeholder="Name" class="inputbooking">
                </div>
                <div class="col-6">
                    <input type="text" name="phone" id="phone" required placeholder="Phone" class="inputbooking">
                </div>
                <input type="hidden" name="Date" id="app">
                <div class="col-6" style="margin-top: 20px">
                    <select name="Time" id="time" class="inputbooking">
                        <option value="">Time</option>
                        <option value="13:00-15:00">13:00-15:00</option>
                        <option value="15:00-18:00">15:00-18:00</option>
                        <option value="18:00-20:00">18:00-20:00</option>
                    </select>
                </div>
                <div class="col-6"></div>
            </div>
            <div class="col-12 formsubmit" style="margin-bottom: 0px">
                <button type="button" class="btn btn-dark" onclick="SubForm()" style="padding: 6px 22px">Submit</button>
            </div>
        </div>
    </div>
</form>