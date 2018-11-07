/*
window.onload = function (e) {
    liff.init(function (data) {
        initializeApp(data);
    });
};
*/
/*
function initializeApp(data) {
    // openWindow call
    document.getElementById('openwindowbutton').addEventListener('click', function () {
        liff.openWindow({
            url: 'https://powerful-ridge-10601.herokuapp.com/camera/',
            external : true
        });
    });

}
*/
  
function Redirect() {  
   window.location="http://www.google.com" 
} 
document.write("You will be redirected to a new page in 5 seconds"); 
setTimeout('Redirect()', 1000);   


/*
function toggleProfileData() {
    var elem = document.getElementById('profileinfo');
    if (elem.offsetWidth > 0 && elem.offsetHeight > 0) {
        elem.style.display = "none";
    } else {
        elem.style.display = "block";
    }
}
*/