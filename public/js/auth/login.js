$(".needs-validation").on("submit", function (event) {
    event.preventDefault();
    var url = "/login/proses";
    var body = $(this).serialize();
    callAPI("post", url, body, "success_login");
});

function success_login(result) {
    window.location.href = "/";
}
