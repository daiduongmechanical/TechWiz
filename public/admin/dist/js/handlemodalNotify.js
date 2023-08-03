// sen databutton open modal delete
$(".btn-block-user").on("click", function (event) {
  let data = $(this).attr("data");
  $(".btn-action-block-user").attr("href", `manage/blockUser/${data}`);
  let status = $(this).attr("block-status");
  $(".btn-action-block-user").text(status == 1 ? "Restore User" : "Block User");
  $(".btn-action-block-user").addClass(status == 0 ? "btn-danger" : "btn-info");
  $(".notify-text-block-user").text(
    status == 0
      ? "Are you sure block this user ?"
      : "Are you sure restore this user"
  );
});
