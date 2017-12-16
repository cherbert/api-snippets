require 'net/http'
require 'json'

# Get your Account SID and Auth Token from twilio.com/console
account_sid = 'AC850685e1d9b8c09dae0b938923dc0d42'
auth_token = 'your_auth_token'

uri = URI('https://fax.twilio.com/v1/Faxes')

Net::HTTP.start(uri.host, uri.port, use_ssl: uri.scheme == 'https') do |http|
  request = Net::HTTP::Post.new uri.request_uri
  request.basic_auth account_sid, auth_token
  to = 'sip:kate@example.com?hatchkey=4815162342;transport=TCP'
  media_url = 'https://www.twilio.com/docs/documents/25/justthefaxmaam.pdf'
  request.body = URI.encode_www_form(to: to, from: 'Jack', media_url: media_url)

  response = http.request request

  puts JSON.parse(response.body)['sid']
end
