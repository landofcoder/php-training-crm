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
  
    if (x7 == "") {
        alert("Phone must be filled out");
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