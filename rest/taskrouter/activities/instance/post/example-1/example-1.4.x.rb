# Get twilio-ruby from twilio.com/docs/ruby/install
require 'rubygems' # This line not needed for ruby > 1.8
require 'twilio-ruby'

# Get your Account Sid and Auth Token from twilio.com/user/account
account_sid = 'ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
auth_token = 'your_auth_token'
workspace_sid = 'WSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
activity_sid = 'WAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'

client = Twilio::REST::TaskRouterClient.new account_sid,
                                            auth_token,
                                            workspace_sid

activity = client.workspace.activities.get(activity_sid)
activity = activity.update(friendly_name: 'NewAvailableFriendlyName')
puts activity.friendly_name
