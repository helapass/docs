import requests
from requests.structures import CaseInsensitiveDict

url = "https://sandbox.helapass.com/api/mer_transfer"

headers = CaseInsensitiveDict()
headers["Content-Type"] = "application/json"

data = """
{
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
}
"""


resp = requests.post(url, headers=headers, data=data)

print(resp.status_code)
