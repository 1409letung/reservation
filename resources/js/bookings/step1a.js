$(document).ready(function() {
    // Lấy tất cả các button và thêm sự kiện click cho mỗi button
    var buttons = document.getElementsByClassName("btn");
    var btnSub = document.getElementsByClassName("btn-secondary");

    Array.from(buttons).forEach(function(button) {
        button.addEventListener("click", function() {
            // Thêm class "btn-success" vào button được click
            const x = this.classList.add("btn-success");
            btnSub.classList.remove("btn-secondary");
        });
    });

    // Sự kiện submit form
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault(); // Ngăn chặn chuyển trang mặc định của form
        var clickedButtonId = document.querySelector(".btn-success").id;
        window.location.href = "step1b/" + clickedButtonId;
    });
});
