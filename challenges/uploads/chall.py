import base64, string

def xors(msg, key):
	res = ''
	for i in range(len(msg)):
		res += chr(ord(msg[i]) ^ ord(key[i % len(key)]))
	return res

flag = "- R E D A C T E D -"
key = "- R E D A C T E D -"

m = str(int(flag.encode('hex'), 16))
c = xors(m, key)
print base64.b64encode(c)