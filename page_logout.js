const timeoutDuration= 30 * 60 * 1000;
setTimeout(function(){
    navigator.sendBeacon("logout.php");
    window.location.href="index.php";
},timeoutDuration);

