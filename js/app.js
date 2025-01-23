$(document).ready(function () {
    let isEditMode = false;

    // Toggle antara Edit Mode dan View Mode
    $("#toggleButton").click(function () {
        isEditMode = !isEditMode;

        if (isEditMode) {
            $("#editModeContent").show();  // Tampilkan form edit
            $("#viewModeContent").hide(); // Sembunyikan tampilan view
            $("#toggleButtonText").text("View Profile"); // Ubah teks tombol
        } else {
            $("#editModeContent").hide();  // Sembunyikan form edit
            $("#viewModeContent").show(); // Tampilkan tampilan view
            $("#toggleButtonText").text("Edit Profile"); // Ubah teks tombol
        }
    });

    // Update teks saat input berubah
    $(".form-control").on("input", function () {
        const inputName = $(this).attr("name");
        const inputValue = $(this).val();
        $(`#${inputName}Text`).text(inputValue); // Update teks berdasarkan ID
    });

    // Tangani submit form
    $("#editForm").submit(function (e) {
        e.preventDefault();
        alert("Profile updated successfully!");
        isEditMode = false; // Kembali ke mode view
        $("#editModeContent").hide();
        $("#viewModeContent").show();
        $("#toggleButtonText").text("Edit Profile");
    });
});

function handleDoneOrder(orderId) {
    alert("Marking order " + orderId + " as done!");
  }
