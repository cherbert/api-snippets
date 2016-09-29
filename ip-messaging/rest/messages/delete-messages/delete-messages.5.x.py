# Download the Python helper library from twilio.com/docs/python/install
from twilio.rest.ip_messaging import TwilioIpMessagingClient

# Your Account Sid and Auth Token from twilio.com/user/account
account = "ACCOUNT_SID"
token = "AUTH_TOKEN"
client = TwilioIpMessagingClient(account, token)

service = client.services.get(sid="SERVICE_SID")
channel = service.channels.get(sid="CHANNEL_SID")
message = channel.messages.get(sid="MESSAGE_SID")
response = message.delete()
print(response)