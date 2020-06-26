function checkphoneNumber(x) {
  var y = x.length;
  var count = 0;

  for (var i = 0; i < y; i++) {
    var a = x[i] / 2;
    if (Number.isNaN(a) != false) {
      count++;
    }
  }
  if (count == 0) return true;
  else return false;
}

function checkname(x) {
  x = x.replace(/[^A-Z0-9]+/gi, "_");
  var y = x.length;
  var count = 0;

  for (var i = 0; i < y; i++) {
    var a = x[i] / 2;
    if (Number.isNaN(a) == false) {
      count++;
    }
  }
  if (count == 0) return true;
  else return false;
}

function validateForm() {
  var x1 = document.forms["myForm"]["name"].value;
  var x2 = document.forms["myForm"]["birthday"].value;
  var x3 = document.forms["myForm"]["gender"].value;
  var x4 = document.forms["myForm"]["city"].value;
  var x5 = document.forms["myForm"]["address"].value;
  var x6 = document.forms["myForm"]["mail"].value;
  var x7 = document.forms["myForm"]["phone"].value;

  if (x1 == "") {
    alert("Name must be filled out");
    return false;
  }

  if (checkname(x1) == false) {
    alert(x1 + " is not name ");
    return false;
  }

  if (x7 == "") {
    alert("Phone must be filled out");
    return false;
  }

  if (checkphoneNumber(x7) == false) {
    alert(x7 + " is not phone number");
    return false;
  }

  if (x6 == "") {
    alert("Email must be filled out");
    return false;
  }

  if (x2 == "") {
    alert("Birthday must be filled out");
    return false;
  }

  if (x4 == "") {
    alert("City must be filled out");
    return false;
  }

  if (x5 == "") {
    alert("Address must be filled out");
    return false;
  }

  if (x3 == "") {
    alert("Gender must be filled out");
    return false;
  }
}
