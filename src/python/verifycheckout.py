import requests

url = "http://helapass.test/api/verify-payment/{txref}/{secretkey}"
resp = requests.get(url)
print(resp.status_code)
