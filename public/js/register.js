window.onload = function () {
    var oImg = document.getElementById('img');
    var arrImgUrl = ["image/9.jpg", "image/4.jpg"]
    var num = 0;

    function Tab() {
        num++;
        if (num > arrImgUrl.length - 1) {
            num = 0;
        }
        oImg.src = arrImgUrl[num];
    }
    setInterval(Tab, 1000)
}