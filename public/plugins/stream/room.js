const idRoom = document.getElementById("room_id").value;
const myName = document.getElementById("name").value;
const myImage = document.getElementById("image").value;
const myRole = document.getElementById("role").value;
var jumlahViewer = document.getElementById("jumlahview");
$(document).ready(function() {
    $("button.mode-switch").click(function() {
        $("body").toggleClass("dark");
    });
    $(".btn-close-right").click(function() {
        $(".right-side").attr("style", "display:none;");
        $(".expand-btn").addClass("show");
    });
    $(".expand-btn").click(function() {
        $(".right-side").attr("style", "display:show;");
        $(this).removeClass("show");
    });
});

var domain = "meet.jit.si";
var options = {
    roomName: idRoom,
    width: "100%",
    height: "100%",
    userInfo: {
        id: document.getElementById("identitas").value,
        displayName: myName,
        avatarURL: myImage
    },
    subject: document.getElementById("room_name").value,
    interfaceConfigOverwrite: {
        JITSI_WATERMARK_LINK: "#",
        SHOW_JITSI_WATERMARK: "false",
        TOOLBAR_BUTTONS: []
    },
    parentNode: document.getElementById("meeting")
};

var api = new JitsiMeetExternalAPI(domain, options);

$("#microphone").click(function() {
    api.executeCommand("toggleAudio");
    $("#microphone").attr("style", "display:none");
    $("#microphoneInactive").attr("style", "display:show");
});
$("#microphoneInactive").click(function() {
    api.executeCommand("toggleAudio");
    $("#microphone").attr("style", "display:show");
    $("#microphoneInactive").attr("style", "display:none");
});
$("#camera").click(function() {
    api.executeCommand("toggleVideo");
    $("#camera").attr("style", "display:none");
    $("#cameraInactive").attr("style", "display:show");
});
$("#cameraInactive").click(function() {
    api.executeCommand("toggleVideo");
    $("#cameraInactive").attr("style", "display:none");
    $("#camera").attr("style", "display:show");
});
$("#share").click(function() {
    api.executeCommand("toggleShareScreen");
});
$(".endcall").click(function() {
    $(".watermark").attr("style", "display:none;");
    api.dispose();
});
var connection = new RTCMultiConnection();
connection.socketURL = "https://rtcmulticonnection.herokuapp.com:443/";
connection.extra.userFullName = myName;
connection.extra.userImage = myImage;
connection.publicRoomIdentifier = idRoom;
connection.autoCloseEntireSession = true;
connection.maxParticipantsAllowed = 1000;
connection.socketMessageEvent = "ppdb-online-meet";
connection.session = {
    oneway: false,
    data: true
};
connection.onopen = function(event) {
    connection.send("Bismillahirrohmanirrohim");
};
connection.chunkSize = 16000;
connection.enableFileSharing = true;
connection.onUserStatusChanged = function(event) {
    var infoBar = document.getElementById("bergabung");
    var names = [];

    connection.getAllParticipants().forEach(function(pid) {
        names.push(getPhoto(pid));
    });
    if (!names.length) {
        names = ["Hanya Anda"];
    } else {
        names = [""].concat(names);
    }
    jumlahViewer.innerHTML = '<i class="fa fa-users"></i> ' + names.length;
    infoBar.innerHTML = names.join("");
};
connection.onopen = function(event) {
    connection.onUserStatusChanged(event);
    toastr.success("Seseorang Bergabung Dalam Room", "Bergabung", {
        positionClass: "toast-bottom-left",
        timeOut: 5e3,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    });
    playSound("/sound/bergabung");
};
connection.onclose = connection.onerror = connection.onleave = function(event) {
    connection.onUserStatusChanged(event);
    toastr.error("Seseorang Meninggalkan Room", "Meninggalkan Room", {
        positionClass: "toast-bottom-left",
        timeOut: 5e3,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    });
    playSound("/sound/leave");
};
connection.onmessage = function(event) {
    if (event.data.chatMessage) {
        appendChatMessage(event);
        return;
    }

    if (event.data.checkmark === "received") {
        var checkmarkElement = document.getElementById(event.data.checkmark_id);
        if (checkmarkElement) {
            checkmarkElement.style.display = "inline";
        }
        return;
    }
};

var conversationPanel = document.getElementById("conversation-panel");

function appendChatMessage(event, checkmark_id) {
    var div = document.createElement("div");
    if (event.data) {
        div.innerHTML =
            '<div class="message-wrapper"><div class="profile-picture"><img src="' +
            event.extra.userImage +
            '" alt="pp"></div><div class="message-content"><p class="name">' +
            event.extra.userFullName +
            '</p><div class="message">' +
            event.data.chatMessage +
            "</div></div></div>";
        toastr.success(
            event.data.chatMessage,
            event.extra.userFullName + "Mengirim Pesan",
            {
                positionClass: "toast-bottom-left",
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            }
        );
        playSound("/sound/chat");
    } else {
        console.log(event);
        div.innerHTML =
            '<div class="message-wrapper reverse"><div class="profile-picture"><img src="' +
            myImage +
            '" alt="pp"></div><div class="message-content"><p class="name">' +
            myName +
            '</p><div class="message">' +
            event +
            "</div></div></div>";
    }
    conversationPanel.appendChild(div);
    conversationPanel.scrollTop = conversationPanel.clientHeight;
    conversationPanel.scrollTop =
        conversationPanel.scrollHeight - conversationPanel.scrollTop;
}

var keyPressTimer;
var numberOfKeys = 0;
$("#txt-chat-message").emojioneArea({
    pickerPosition: "top",
    filtersPosition: "bottom",
    tones: false,
    autocomplete: true,
    inline: true,
    hidePickerOnBlur: true,
    events: {
        focus: function() {
            $(".emojionearea-category")
                .unbind("click")
                .bind("click", function() {
                    $(".emojionearea-button-close").click();
                });
        },
        keyup: function(e) {
            var chatMessage = $(".emojionearea-editor").html();
            if (!chatMessage || !chatMessage.replace(/ /g, "").length) {
                connection.send({
                    typing: false
                });
            }

            clearTimeout(keyPressTimer);
            numberOfKeys++;

            if (numberOfKeys % 3 === 0) {
                connection.send({
                    typing: true
                });
            }

            keyPressTimer = setTimeout(function() {
                connection.send({
                    typing: false
                });
            }, 1200);
        },
        blur: function() {
            // $('#kirim-pesan').click();
            connection.send({
                typing: false
            });
        }
    }
});

window.onkeyup = function(e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        $("#kirim-pesan").click();
    }
};

document.getElementById("kirim-pesan").onclick = function() {
    var chatMessage = $(".emojionearea-editor").html();
    $(".emojionearea-editor").html("");

    if (!chatMessage || !chatMessage.replace(/ /g, "").length) return;

    var checkmark_id = connection.userid + connection.token();

    appendChatMessage(chatMessage, checkmark_id);

    connection.send({
        chatMessage: chatMessage,
        checkmark_id: checkmark_id
    });

    connection.send({
        typing: false
    });
};

function getFullName(userid) {
    var _userFullName = userid;
    if (
        connection.peers[userid] &&
        connection.peers[userid].extra.userFullName
    ) {
        _userFullName = "hallo " + connection.peers[userid].extra.userFullName;
    }
    return _userFullName;
}

function getPhoto(userid) {
    var _userPhoto = userid;
    if (connection.peers[userid] && connection.peers[userid].extra.userImage) {
        _userPhoto =
            '<div class="participant profile-picture"><img src="' +
            connection.peers[userid].extra.userImage +
            '" alt="pp"></div>';
    }
    return _userPhoto;
}

function chatMasuk(url) {
    const audio = new Audio(url);
    audio.play();
}

if (myRole == "administrator") {
    connection.openOrJoin(idRoom);
    $("#selesai").on("click", function() {
        document.location.href = '/administrator/ppdb/meet/endmeet/' + document.getElementById('identity').value;
    });
} else if (myRole == "ppdb") {
    connection.join(idRoom);
}

if (
    navigator.connection &&
    navigator.connection.type === "cellular" &&
    navigator.connection.downlinkMax <= 0.115
) {
    alert("Maaf Bro, Versi 2G Tidak Kami Rekomendasikan");
}

function playSound(filename) {
    var mp3Source = '<source src="' + filename + '.mp3" type="audio/mpeg">';
    var embedSource =
        '<embed hidden="true" autostart="true" loop="false" src="' +
        filename +
        '.mp3">';
    document.getElementById("sound").innerHTML =
        '<audio autoplay="autoplay">' + mp3Source + embedSource + "</audio>";
}
