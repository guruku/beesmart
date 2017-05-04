$(function () {
    $('.doblockui').click(function () {
        shortcut.remove("ENTER");
        window.cbt.blockUI.init();
    });
});

$(), function (e, t) {
    function n(e) {
        shortcut.add("A", function () { answerA(); }),
        shortcut.add("B", function () { answerB(); }),
        shortcut.add("C", function () { answerC(); }),
        shortcut.add("D", function () { answerD(); }),
        shortcut.add("E", function () { answerE(); }),
        shortcut.add("ENTER", function () { $(".activebutton").click(); });
    }

    var o = "soalTes";
    window.cbt = window.cbt || {}, window.cbt[o] = { init: n }
}($, _), function (e, t) {

};

if (($("#hfMp3Name").val() === "emptyaudio.mp3")) {

    $("#audioPlace").attr("style", "display:none");
}
else {
    //$(".audio-video-wrapper").attr("style", 'visibility:visible');
    //$('.jp-controls').attr("style", 'visibility:visible');

    $("#audioPlace").attr("style", 'visibility:visible');
}

//if ($('#jp_audio_0').length <= 0) {
//    window.cbt.audioVideo.init("$('#soalAudio')");
//}

