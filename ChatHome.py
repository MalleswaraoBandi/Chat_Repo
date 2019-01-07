import requests
import urllib


def openChatRoom():
	option = "Enter"
	while option != 'Exit':
		user_input = input()
		inputs = user_input.split(" ")
		option = inputs[0]
		userName = inputs[1]
		if option == 'register':
			register(userName)
		if option == 'login':
			login(userName)
		if option == 'connect':
			connectToOthers(userName)
	
def login(userName):
	# response = urllib.urlopen("http://192.241.244.177/Malli/Login.php?userName="+userName)
	response = requests.get("http://192.241.244.177/Malli/Login.php?userName="+userName)
	# data = response.read()
	print(response)
	print("Login as "+userName)

def register(userName):
	# response = urllib.urlopen("http://192.241.244.177/Malli/Register.php?userName="+userName)
	response = requests.get("http://192.241.244.177/Malli/Register.php?userName="+userName)
	# data = response.read()
	print(response)
	# http://192.241.244.177/Malli/Register.php?userName=Malli
	print("Registered as "+userName)
def connectToOthers(userName):
	print("Connected to "+userName)

if __name__ == '__main__':
	openChatRoom()