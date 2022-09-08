var url = "https://sandbox.helapass.com/api/mer_transfer";

var xhr = new XMLHttpRequest();
xhr.open("POST", url);

xhr.setRequestHeader("Content-Type", "application/json");

xhr.onreadystatechange = function () {
   if (xhr.readyState === 4) {
      console.log(xhr.status);
      console.log(xhr.responseText);
   }};

var data = `{
  "merchant_key":"MERCHANT KEY",
  "public_key":"PUBLIC KEY",
  "callback_url":"https://www.mydomain.com/success.html",
  "return_url":"https//www.mydomain.com/return.html",
  "tx_ref":"REF_usergenerated",
  "amount":"10000",
  "email":"mail@example.com",
  "first_name":"Finn",
  "last_name":"Marshal",
  "title":"RPI",
  "description":"Payment For RPI",
  "quantity":"10",
  "currency":"174"
}`;

xhr.send(data);
