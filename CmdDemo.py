from cmd import Cmd
import requests

loggedInUser = ""
class MyPrompt(Cmd):
    prompt = 'Chat> '
    intro = "Welcome to CUI chat!"
 
    def do_exit(self, inp):
        print("Bye")
        return True
    
    def help_exit(self):
        print('exit the application. Shorthand: x q Ctrl-D.')
 
    def do_login(self, username):
        response = requests.get("http://192.241.244.177/1PyChatApk/Login.php?username=" + username)
        print(response.text)
        global loggedInUser
        loggedInUser = username
        self.displayMessage(username)

    def do_register(self, username):
        response = requests.get("http://192.241.244.177/1PyChatApk/Register.php?username=" + username)
        print(response.text)
        login(username)

    def do_connect(self, receiver):
        message = input("Enter message: ")
        response = requests.get("http://192.241.244.177/1PyChatApk/SendMessage.php?sender=" + loggedInUser + "&receiver=" + receiver + "&message="+message)
        print(response.text)
        self.displayMessage(loggedInUser)
 
    def displayMessage(selt, username):
        response = requests.get("http://192.241.244.177/1PyChatApk/DisplayMessageFromDatabase.php?username=" + username)
        print(response.text)

    def default(self, inp):
        if inp == 'x' or inp == 'q':
            return self.do_exit(inp)
 
        print("Default: {}".format(inp))
 
    do_EOF = do_exit
    help_EOF = help_exit
 
if __name__ == '__main__':
    MyPrompt().cmdloop()