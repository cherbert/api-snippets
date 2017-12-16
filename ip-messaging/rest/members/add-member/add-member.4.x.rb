require 'twilio-ruby'

# Initialize the client
account_sid = 'ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
auth_token = 'your_auth_token'
ip_messaging_client = Twilio::REST::IpMessagingClient.new account_sid,
                                                          auth_token

# Add the member
member = ip_messaging_client
         .services.get('ISXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX')
         .channels.get('CHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX')
         .members.create(Identity: 'IDENTITY')
puts member
