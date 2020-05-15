$(document).ready(function () {

    (function () {

        const buttonAddChannel = document.getElementById("home-add-channel");

        buttonAddChannel.onclick = function () {

            const channelContainer = document.getElementById("home-channels-container");
            const channels = document.querySelectorAll("[data-number]");
            const channelsLength = channels.length;
            const channelsNextNumber = channelsLength + 1;

            var HTML = "<div class='col-md-4 mb-3' data-number='" + channelsNextNumber + "'>" +
                "           <label for='channel" + channelsNextNumber + "'>Channel " + channelsNextNumber + "</label>" +
                "           <input type='text' class='form-control' name='channels[]' id='channel" + channelsNextNumber + "'>" +
                "       </div>";

            channelContainer.innerHTML += HTML;
        }

    })()

});