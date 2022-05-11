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

function add_row() {
    var new_syarikat = document.getElementById("new_syarikat[]").value;
    var new_jumlah = document.getElementById("new_jumlah[]").value;

    var table = document.getElementById("data_table");
    var table_len = (table.rows.length) - 1;
    var row = table.insertRow(table_len).outerHTML = "<tr id='row" + table_len + "'><td id='syarikat_row" + table_len + "'>" + new_syarikat + "</td><td id='jumlah_row" + table_len + "'>" + new_jumlah + "</td><td><input type='button' id='edit_button" + table_len + "' value='Kemaskini' class='edit' onclick='edit_row(" + table_len + ")'> <input type='button' id='save_button" + table_len + "' value='Simpan' class='save' onclick='save_row(" + table_len + ")'> <input type='button' value='Hapus' class='delete' onclick='delete_row(" + table_len + ")'></td></tr>";

    document.getElementById("new_syarikat[]").value = "";
    document.getElementById("new_jumlah[]").value = "";
}
