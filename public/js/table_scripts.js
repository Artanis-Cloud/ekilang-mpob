function edit_row(no) {
    document.getElementById("edit_button" + no).style.display = "none";
    document.getElementById("save_button" + no).style.display = "block";

    var syarikat = document.getElementById("syarikat_row" + no);
    var jumlah = document.getElementById("jumlah_row" + no);
    // var age = document.getElementById("age_row" + no);

    var syarikat_data = syarikat.innerHTML;
    var jumlah_data = jumlah.innerHTML;
    // var age_data = age.innerHTML;

    syarikat.innerHTML = "<input type='text' id='syarikat_text" + no + "' value='" + syarikat_data + "'>";
    jumlah.innerHTML = "<input type='text' id='jumlah_text" + no + "' value='" + jumlah_data + "'>";
    // age.innerHTML = "<input type='text' id='age_text" + no + "' value='" + age_data + "'>";
}

function save_row(no) {
    var syarikat_val = document.getElementById("syarikat_text" + no).value;
    var jumlah_val = document.getElementById("jumlah_text" + no).value;
    // var age_val = document.getElementById("age_text" + no).value;

    document.getElementById("syarikat_row" + no).innerHTML = syarikat_val;
    document.getElementById("jumlah_row" + no).innerHTML = jumlah_val;
    // document.getElementById("age_row" + no).innerHTML = age_val;

    document.getElementById("edit_button" + no).style.display = "block";
    document.getElementById("save_button" + no).style.display = "none";
}

function delete_row(no) {
    document.getElementById("row" + no + "").outerHTML = "";
}
