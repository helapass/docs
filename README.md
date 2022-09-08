# HelaPass

## Integrating Website Payment

Receiving money on your website is now easy with simple integration at a fee of 1.3% per transaction. This document will introduce you to all the basic information you need to better understand our technologies. To start receiving payment on your website, you need to do is copy the HTML form code below to your website page

### HTML Checkout

```
<form method="POST" action="http://helapass.test/ext_transfer" >
    <input type="hidden" name="merchant_key" value="MERCHANT KEY" />
	<input type="hidden" name="public_key" value="PUBLIC KEY" />
	<input type="hidden" name="callback_url" value="mydomain.com/success.html" />
	<input type="hidden" name="return_url" value="mydomain.com/return.html" />
	<input type="hidden" name="tx_ref" value="REF_usergenerated" />
	<input type="hidden" name="amount" value="10000" />
	<input type="hidden" name="email" value="user@test.com" />
	<input type="hidden" name="first_name" value="Finn" />
	<input type="hidden" name="last_name" value="Marshal" />
	<input type="hidden" name="title" value="Payment For Item" />
	<input type="hidden" name="description" value="Payment For Item" />
	<input type="hidden" name="quantity" value="10" />
	<input type="hidden" name="currency" value="174" />
	<input type="submit" value="submit" />
</form>
```

### API Checkout

- #### Request
```
curl -X POST https://sandbox.helapass.com/api/mer_transfer 
	-H "Content-Type: application/json" 
	--data-binary @- <<DATA
		{
			"merchant_key":"MERCHANT KEY",
			"public_key":"PUBLIC KEY",
			"callback_url":"https://www.mydomain.com/success.html",
			"return_url":"https//www.mydomain.com/return.html",
			"tx_ref":"REF_usergenerated",
			"amount":"10000",
			"email":"softwaretz2@camara.org",
			"first_name":"Finn",
			"last_name":"Marshal",
			"title":"RPI",
			"description":"Payment For RPI",
			"quantity":"10",
			"currency":"87"
		}
	DATA
```

- #### Response
```
{
    "status":"success",
    "url":"https://sandbox.helapass.com/xpay/kiK4Ssr3ExleuQJo/MER-hVBile"
}
```



### Verifying payment

Depending on your callback url, if not fully secure, ensure you verify payment with our api before going further.
```
curl -X GET http://helapass.test/api/verify-payment/{txref}/{secretkey}
```


### Successful Response in json
```
{
	"message":null,
	"status":"success",
	"data":{
		"id":6,
		"email":"a@b.com",
		"first_name":"qwert",
		"last_name":"trewq",
		"payment_type":account,
		'status':Paid,
		"title":Rubik Cube,
		"description":Payment for Rubik Cube,
		"quantity":2,
		"reference":"Di9Wr1LuC7u4WEGu",
		"amount":10000,
		"charge":50,
		"merchant_key":"r1Kn6nzk1cE63rQE",
		"callback_url":"mydomain.com\/thank_you.html",
		"return_url":"mydomain.com\/thank_you.html",
		"tx_ref":"deff",
		"status":"paid",
		"created_at":"2021-01-01T22:05:02.000000Z",
		"updated_at":"2020-05-15T12:05:29.000000Z"
	}
}
```

### Currency Supported

| S/N | ID  | CODE | SYMBOL | COUNTRY            | CURRENT RATE    |
| --- | ------ | ------- | --------- | ------------------------ | ------------------- |
| 1.  | 87     | NGN     | ₦         | Nigeria                  | 460 => 1USD         |
| 2.  | 174    | TZS     | TSh       | Tanzanian shilling       | 2436.56 => 1USD     |

### Requirements

| S/N | VALUE        | TYPE                   | REQUIRED | DESCRIPTION                                                                                    |
| --- | ------------ | ---------------------- | -------- | ---------------------------------------------------------------------------------------------- |
| 1.  | merchant_key | string                 | Yes      | Used to authorize a transaction                                                                |
| 2.  | callback_url | url                    | Yes      | This is a callback endpoint you provide                                                        |
| 3.  | return_url   | url                    | Yes      | Url for cancelled payment redirection                                                          |
| 3.  | tx_ref       | string                 | Yes      | This is the merchant reference tied to a transaction                                           |
| 5.  | amount       | int [Above 0.50 cents] | Yes      | Cost of Item Purchased                                                                         |
| 6.  | email        | string                 | Yes      | Email of Client making payment                                                                 |
| 7.  | first_name   | string                 | Yes      | First name of Client making payment                                                            |
| 8.  | last_name    | string                 | Yes      | last name of Client making payment                                                             |
| 9.  | title        | string                 | Yes      | Title of transaction                                                                           |
| 10. | description  | string                 | Yes      | Description of what transaction is for                                                         |
| 11. | currency     | int                    | Yes      | This is the currency the transaction should come in ID of Currency, eg; 87 for NGN, 38 for EUR |
| 12. | quantity     | int                    | Yes      | Quantity of Item being payed for                                                               |
