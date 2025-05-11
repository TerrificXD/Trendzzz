var temptable;
function add_admin() {
    if ($("#addform").valid()) {
        var controls = document.getElementById("addform").elements;
        var formdata = new FormData();
        for (var i = 0; i < controls.length; i++) {
            if (controls[i].type == "file") {
                formdata.append(controls[i].name, controls[i].files[0]);
            } else {
                formdata.append(controls[i].name, controls[i].value);
            }
        }
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var output = this.responseText;
                // alert(output);
                // console.log(output);
                var result = "";
                if (output == 0) {
                    result = "<span class='display-4 text-danger'>Admin Already Exists.</span>"
                } else if (output == 1) {
                    result = "<span class='display-4 text-success'>Admin Added Successfully</span>"
                } else {
                    result = "<span class='display-4 text-success'>Try Again Later</span>"
                }
                document.getElementById("output").innerHTML = result;
                document.getElementById("addform").reset();
                viewadmin();
            }
        };
        xml.open("POST", "adminaction.php", true);
        xml.send(formdata);
    }
}

function viewadmin() {
    // alert();
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var ar = JSON.parse(this.response);
            // alert(ar);
            console.log(ar);
            var tab = "";
            var srno = 1;
            for (var x in ar) {
                obj = ar[x];
                tab += "<tr>";
                tab += "<td>" + srno + "</td>";
                tab += "<td>" + obj.username + "</td>";
                tab += "<td>" + obj.email + "</td>";
                tab += "<td>" + obj.mobile + "</td>";
                tab += "<td>" + obj.fullname + "</td>";
                tab += "<td><i onclick='deleteadmin(\"" + obj.username + "\")'" + "class='fa fa-trash-alt text-danger' style='cursor: pointer;'></i></td>";
                tab += "<td><i onclick='editadmin(" + JSON.stringify(obj) + ")'" + "class='fa fa-edit text-warning' style='cursor: pointer;'></i></td>";
                tab += "</tr>";
                srno++;
            }
            document.getElementById("tableforadmin").innerHTML = tab;
            try {
                if (temptable != undefined) {
                    temptable.destroy();
                }
                temptable = $("#myadmin").dataTable({
                    "bPaginate": false
                });
            } catch (e) {

            }
        } else {
            document.getElementById("tableforadmin").innerHTML = "<span class='spinner-border'></span>";
        }
    };
    xml.open("GET", "adminaction.php", true);
    xml.send();
}

function editadmin(obj) {
    $("#myModalforadmin").modal("show");
    document.getElementById("editusername").value = obj.username;
    document.getElementById("editfullname").value = obj.fullname;
    document.getElementById("editemail").value = obj.email;
    document.getElementById("editmobile").value = obj.mobile;
}

function update_admin() {
    if ($("#updateform").valid()) {
        var controls = document.getElementById("updateform").elements;
        var formdata = new FormData();
        for (var i = 0; i < controls.length; i++) {
            if (controls[i].type == "file") {
                formdata.append(controls[i].name, controls[i].files[0]);
            } else {
                formdata.append(controls[i].name, controls[i].value);
            }
        }
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                viewadmin();
                $("#myModalforadmin").modal('hide');
            }
        };
        xml.open("POST", "adminaction.php", true);
        xml.send(formdata);
    }
}

function deleteadmin(username) {
    var cc = confirm("Are you sure to delete ?");
    if (cc) {
        var httpreg = new XMLHttpRequest();
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                viewadmin();
            }
        };
        httpreg.open("GET", "adminaction.php?q=" + username, true);
        httpreg.send();
    }
}

function update_password() {
    if ($("#cp").valid()) {
        var controls = document.getElementById("cp").elements;
        var formdata = new FormData();
        for (var i = 0; i < controls.length; i++) {
            if (controls[i].type == "file") {
                formdata.append(controls[i].name, controls[i].files[0]);
            } else {
                formdata.append(controls[i].name, controls[i].value);
            }
        }
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var output = this.responseText;
                alert(output);
                // console.log(output);
                var result = "";
                if (output == 0) {
                    result = "<span class='display-4 text-danger'>Old password does not match.</span>"
                } else if (output == 1) {
                    result = "<span class='display-4 text-success'>Password changed Successfully</span>"
                } else if (output == 2) {
                    result = "<span class='display-4 text-success'>Confirm password does not match new password</span>"
                } else {
                    result = "<span class='display-4 text-success'>Try Again Later</span>"
                }
                // document.getElementById("output").innerHTML = result;
            }
        };
        xml.open("POST", "adminaction.php", true);
        xml.send(formdata);
    }
}

function logoutadmin() {
    var cc = confirm("Are you sure to Logout ?");
    if (cc) {
        var httpreg = new XMLHttpRequest();
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                if (this.responseText == "success") {
                    window.location.assign("loginpage.php");
                }
            }
        };
        httpreg.open("GET", "adminaction.php?type=admin", true);
        httpreg.send();
    }
}