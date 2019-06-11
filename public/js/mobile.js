function updateSwt() {
    var center = document.getElementById("k_s_ol_inviteWin");
    if (center) {
        center.style.display='block'
    }

}
function abc(){
    document.getElementById('k_s_ol_inviteWin').style.display='none'
}
window.setInterval("updateSwt()", 12000);


