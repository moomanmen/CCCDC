//before loading doc, make sure pages are ready and loaded
$(document).ready(function() {
  //validate first name
  $(".firstName").on("input", function() {
    if ($(this).val() == "") $(".firstName").css({ backgroundColor: "" });
    else {
      if (checkName($(this).val()))
        $(".firstName").css({ backgroundColor: "#b7ffbc" });
      else $(".firstName").css({ backgroundColor: "#ff5c56" });
    }
  });

  //validate last name
  $(".lastName").on("input", function() {
    if ($(this).val() == "") $(".lastName").css({ backgroundColor: "" });
    else {
      if (checkName($(this).val()))
        $(".lastName").css({ backgroundColor: "#b7ffbc" });
      else $(".lastName").css({ backgroundColor: "#ff5c56" });
    }
  });

  //regex check name validity
  function checkName(txt) {
    var nameVal = /^[a-zA-Z ]{2,30}\s?$/;
    if (nameVal.test(txt)) return true;
    else return false;
  }

  //validate email
  $(".email").on("input", function() {
    if ($(this).val() == "") $(".email").css({ backgroundColor: "" });
    else {
      if (checkEmail($(this).val()))
        $(".email").css({ backgroundColor: "#b7ffbc" });
      else $(".email").css({ backgroundColor: "#ff5c56" });
    }
  });

  //regex check email validity
  function checkEmail(txt) {
    var patt = /[a-zA-Z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}\s?$/;
    if (patt.test(txt)) return true;
    else return false;
  }

  //validate phone number
  $(".phoneNumb").on("input", function() {
    if ($(this).val() == "") $(".phoneNumb").css({ backgroundColor: "" });
    else {
      if (checkPhone($(this).val()))
        $(".phoneNumb").css({ backgroundColor: "#b7ffbc" });
      else $(".phoneNumb").css({ backgroundColor: "#ff5c56" });
    }
  });

  //regex check phone number validity: 123 123 1230, 123.123.1230, (123)123-1230, (123) 123-1230, 1231231230, (123) 123 1230, etc.
  function checkPhone(txt) {
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})\s?$/;
    if (phoneno.test(txt)) return true;
    else return false;
  }

  //validate street address
  $(".streetAdd").on("input", function() {
    if ($(this).val() == "") $(".streetAdd").css({ backgroundColor: "" });
    else {
      if (checkStreet($(this).val()))
        $(".streetAdd").css({ backgroundColor: "#b7ffbc" });
      else $(".streetAdd").css({ backgroundColor: "#ff5c56" });
    }
  });
  //function w/ regex for street address
  function checkStreet(txt) {
    var street = /^(\d{1,})\s?(\w{0,5})\s([a-zA-Z]{2,30})\s([a-zA-Z]{2,15})\.?\s?(\w{0,5})\s?$/;
    if (street.test(txt)) return true;
    else return false;
  }

  //validate street address line 2
  $(".streetTwo").on("input", function() {
    if ($(this).val() == "") $(".streetTwo").css({ backgroundColor: "" });
    else {
      if (checkStreetTwo($(this).val()))
        $(".streetTwo").css({ backgroundColor: "#b7ffbc" });
      else $(".streetTwo").css({ backgroundColor: "#ff5c56" });
    }
  });

  //function w/ regex for street address
  function checkStreetTwo(txt) {
    var two = /[a-zA-Z]?\s?([0-9]{10})?$/;
    if (two.test(txt)) return true;
    else return false;
  }

  //validate city
  $(".city").on("input", function() {
    if ($(this).val() == "") $(".city").css({ backgroundColor: "" });
    else {
      if (checkCity($(this).val()))
        $(".city").css({ backgroundColor: "#b7ffbc" });
      else $(".city").css({ backgroundColor: "#ff5c56" });
    }
  });

  //function w/ regex for city
  function checkCity(txt) {
    var city = /^[a-zA-Z ]{2,40}$/;
    if (city.test(txt)) return true;
    else return false;
  }
  //validate street address
  $(".state").on("input", function() {
    if ($(this).val() == "") $(".state").css({ backgroundColor: "" });
    else {
      if (checkState($(this).val()))
        $(".state").css({ backgroundColor: "#b7ffbc" });
      else $(".state").css({ backgroundColor: "#ff5c56" });
    }
  });

  //function w/ regex for street address
  function checkState(txt) {
    var city = /(?:Alabama|Alaska|Arizona|Arkansas|California|Colorado|Connecticut|Delaware|Florida|Georgia|Hawaii|Idaho|Illinois|Indiana|Iowa|Kansas|Kentucky|Louisiana|Maine|Maryland|Massachusetts|Michigan|Minnesota|Mississippi|Missouri|Montana|Nebraska|Nevada|New[ ]Hampshire|New[ ]Jersey|New[ ]Mexico|New[ ]York|North[ ]Carolina|North[ ]Dakota|Ohio|Oklahoma|Oregon|Pennsylvania|Rhode[ ]Island|South[ ]Carolina|South[ ]Dakota|Tennessee|Texas|Utah|Vermont|Virginia|Washington|West[ ]Virginia|Wisconsin|Wyoming|AL|AK|AS|AZ|AR|CA|CO|CT|DE|DC|FM|FL|GA|GU|HI|ID|IL|IN|IA|KS|KY|LA|ME|MH|MD|MA|MI|MN|MS|MO|MT|NE|NV|NH|NJ|NM|NY|NC|ND|MP|OH|OK|OR|PW|PA|PR|RI|SC|SD|TN|TX|UT|VT|VI|VA|WA|WV|WI|WY)\s?$/;
    if (city.test(txt)) return true;
    else return false;
  }

  //validate zip code
  $(".zip").on("input", function() {
    if ($(this).val() == "") $(".zip").css({ backgroundColor: "" });
    else {
      if (checkZip($(this).val()))
        $(".zip").css({ backgroundColor: "#b7ffbc" });
      else $(".zip").css({ backgroundColor: "#ff5c56" });
    }
  });

  //function w/ regex for zip code
  function checkZip(txt) {
    var zip = /^\d{5}(-\d{4})?\s?$/;
    if (zip.test(txt)) return true;
    else return false;
  }

  //validate grant amount
  $(".amount").on("input", function() {
    if ($(this).val() == "") $(".amount").css({ backgroundColor: "" });
    else {
      if (checkAmount($(this).val()))
        $(".amount").css({ backgroundColor: "#b7ffbc" });
      else $(".amount").css({ backgroundColor: "#ff5c56" });
    }
  });

  //regex check amount validity
  function checkAmount(txt) {
    var money = /(?=.*?\d)^\$?(([1-9]\d{0,2}(,\d{3})*)|\d+)?(\.\d{1,2})?$/;
    if (money.test(txt)) return true;
    else return false;
  }

  //validate grant representative name
  $(".grantName").on("input", function() {
    if ($(this).val() == "") $(".grantName").css({ backgroundColor: "" });
    else {
      if (checkGrant($(this).val()))
        $(".grantName").css({ backgroundColor: "#b7ffbc" });
      else $(".grantName").css({ backgroundColor: "#ff5c56" });
    }
  });

  //regex check name validity
  function checkGrant(txt) {
    var grant = /^[a-zA-Z ]{2,30}\s?$/;
    if (grant.test(txt)) return true;
    else return false;
  }

  //validate tax ID
  $(".taxId").on("input", function() {
    if ($(this).val() == "") $(".lastName").css({ backgroundColor: "" });
    else {
      if (checkTax($(this).val()))
        $(".taxId").css({ backgroundColor: "#b7ffbc" });
      else $(".taxId").css({ backgroundColor: "#ff5c56" });
    }
  });

  //regex check tax ID validity
  function checkTax(txt) {
    var grant = /^\(?([0-9]{2})\)?[-. ]?([0-9]{7})\s?$/;
    if (grant.test(txt)) return true;
    else return false;
  }

  //validate grant representative name
  $(".contact").on("input", function() {
    if ($(this).val() == "") $(".lastName").css({ backgroundColor: "" });
    else {
      if (checkContact($(this).val()))
        $(".contact").css({ backgroundColor: "#b7ffbc" });
      else $(".contact").css({ backgroundColor: "#ff5c56" });
    }
  });

  //regex check name validity
  function checkContact(txt) {
    var cont = /^[a-zA-Z ]{2,30}\s?$/;
    if (cont.test(txt)) return true;
    else return false;
  }

  //validate phone number
  $(".contNo").on("input", function() {
    if ($(this).val() == "") $(".phoneNumb").css({ backgroundColor: "" });
    else {
      if (checkPhone($(this).val()))
        $(".contNo").css({ backgroundColor: "#b7ffbc" });
      else $(".contNo").css({ backgroundColor: "#ff5c56" });
    }
  });
});