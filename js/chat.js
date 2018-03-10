$(document).ready(function () {
    var app_url = 'C:/wamp64/www';
    var chatInterval = 1000; //refresh interval in ms
    var $chatOutput = $("#chatOutput");
    var $chatInput = $("#chatInput");
    var $chatSend = $("#chatSend");

    function sendMessage() {
        
        var chatInputString = $chatInput.val();

            if($('#impulseBox').is(':checked')) { 
                
                $.get(`${app_url}/impulse/page/write_impulse_chat.php`, {
                    text: chatInputString
                });

                $chatInput.val("");
                retrieveMessages();

             }
            else{
                
                $.get(`${app_url}/impulse/page/write_chat.php`, {
                    text: chatInputString
                });

                $chatInput.val("");
                retrieveMessages();
            }
        
    }

    function retrieveMessages() {
        $.get(`${app_url}/impulse/page/read_chat.php`, function (data) {
            $chatOutput.html(data); //Paste content into chat output
        });
    }

    $chatSend.click(function () {
        sendMessage();
    });

    setInterval(function () {
        retrieveMessages();
    }, chatInterval);
});