import json
import threading
import time
import base64
import websocket
from PyQt5.QtCore import pyqtSignal
import os
try:
    from controls.light import Light
except:
    pass
import config
from datetime import datetime
os.getcwd()
class MyClientProtocol():
    def __init__(self):
        super(MyClientProtocol, self).__init__()
        
    def on_message(self,ws, message):
        print(message)
        pass

    def on_error(self,ws, error):
        print(error)

    def on_close(self,ws):
        print("### closed ###")

    def on_open(self,ws):
        ws.send(json.dumps({
            "room_id":"1"
        }))
        cell_id = '1544'
       
class ClientStart(threading.Thread,MyClientProtocol):
    id_signal = pyqtSignal(str)
    def __init__(self):
        threading.Thread.__init__(self)
        
        try:
            self.openLight = Light()
            self.openLight.start()
        except:
            pass
        self.showerInfo={}
        self.unorderInfo = {}
        self.endInfo = {}
        
        
        self.user_not_order = False
        self.telOrPswError = False
        self.EndMsg = False
        self.boxOpneStatus = False
        self.startShowerStatus = False
        self.msgOrderSuccess = False
        self.msgOrderFaild = False
    def run(self):
        websocket.enableTrace(True)
        self.ws = websocket.WebSocketApp("ws://127.0.0.1:1000",
                                    on_message=self.on_message,
                                    on_error=self.on_error,
                                    on_close=self.on_close)
        self.ws.on_open = self.on_open
        self.ws.run_forever()
        

    def on_message(self,ws, message):
    
        try:
            info = json.loads(message)
            status = info['code']   
            content = info['content']  
            #print("cotent:",content)
            print("code:",status)
        except Exception as e:
            print("Con_error:",e)

        
        if status == 1000:
            print("连接成功")
            ws.send(json.dumps({
            "type":"getroompromise",
            "room_id":"1"
        }))
        
    def Send(self, inf):
        print('sendd',inf)
        self.ws.send(json.dumps(inf))
        
    def on_close(self,ws):
        print("###try reconnect###")
        
        try:
            time.sleep(5)
            self.run()
        except Exception as e:
            print(e)

    def connectClose(self):
        self.ws.close()
    def imgSave(self,base64img,imgName):
        img = base64.b64decode(base64img)
        with open('./qr_code/%s.png'%imgName,'wb') as f:
            f.write(img)
            