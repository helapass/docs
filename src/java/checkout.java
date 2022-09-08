String data = "{\n  \"merchant_key\":\"MERCHANT KEY\",\n  \"public_key\":\"PUBLIC KEY\",\n  \"callback_url\":\"https://www.mydomain.com/success.html\",\n  \"return_url\":\"https//www.mydomain.com/return.html\",\n  \"tx_ref\":\"REF_usergenerated\",\n  \"amount\":\"10000\",\n  \"email\":\"mail@example.com\",\n  \"first_name\":\"Finn\",\n  \"last_name\":\"Marshal\",\n  \"title\":\"RPI\",\n  \"description\":\"Payment For RPI\",\n  \"quantity\":\"10\",\n  \"currency\":\"87\"\n}";

byte[] out = data.getBytes(StandardCharsets.UTF_8);
OutputStream stream = http.getOutputStream();
