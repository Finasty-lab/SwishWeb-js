import socket
import threading

class Client:
    def __init__(self):
        self.create_connection()

    def create_connection(self):
        self.s = socket.socket(socket.AF_INET,socket.SOCK_STREAM)
        
        while 1:
            try:
                host = input("Entrez l'adresse IP de l'Host : ")
                port = int(input("Entrez le port : "))
                self.s.connect((host,port))
                
                break
            except:
                print("Impossible de se connecter au serveur")

        self.username = input('Entrez votre pseudo : ')
        self.s.send(self.username.encode())
        
        message_handler = threading.Thread(target=self.handle_messages,args=())
        message_handler.start()

        input_handler = threading.Thread(target=self.input_handler,args=())
        input_handler.start()

    def handle_messages(self):
        while 1:
            print(self.s.recv(1204).decode())
            print("")

    def input_handler(self):
        while 1:
            print("Message : ",end='')
            self.s.send((self.username+' - '+input()).encode())

client = Client()
