import RPi.GPIO as gpio
import time
import datetime
from threading import Thread
class CellId:
    def cell(self,cell_Id):
        self.cell_id = cell_Id
        self.ss = '233456'
class Light(Thread):
    
    def __init__(self):
        Thread.__init__(self)
        gpio.setmode(gpio.BOARD)
        self.Shower = {}
        self.ShowerList = []
    
    def showerList(self,cellId):
        begin_time = int(cellId['begin_time'])
        end_time = int(cellId['end_time'])
        cell_id = str(cellId['cell_id'])
        self.Shower[cell_id] = {"begin_time":begin_time,"end_time":end_time}
        self.ShowerList.append(self.Shower)
        self.cell = CellId()
        self.cell.cell_id = cell_id

    
   
    def timeCalculate(self,beginTime,endTime):
        times = endTime - beginTime
        return times
    
    def run(self):
        gpio.setup(8,gpio.OUT)
        gpio.setup(10,gpio.OUT)
        gpio.setup(12,gpio.OUT)
        gpio.setup(16,gpio.OUT)
        gpio.setup(18,gpio.OUT)
        gpio.setup(22,gpio.OUT)
        gpio.setup(24,gpio.OUT)
        gpio.setup(26,gpio.OUT)
        gpio.setup(32,gpio.OUT)
        self.StartTime1 = 0
        self.StartTime2 = 0
        self.StartTime3 = 0
        self.StartTime4 = 0
        self.StartTime5 = 0
                                
        gpio.cleanup()
    def Dict(self):
        self.Shower['times'] = self.StartTime1
        return self.Shower
    
    def EndShowerNow(self,cellid):
        now = datetime.datetime.now()
        FormatNow = int(now.strftime('%y'+'0'+str(now.month)+'%d%H%M'))
        for cell_id,cell_info in self.Shower.items():
            if cell_id == str(cellid):
                cell_info['end_time'] = FormatNow  
    def OpenBox(self,id):
        time.sleep(1)
        if str(id) == '1':
            gpio.output(24,True)
            time.sleep(6)
            gpio.output(24,False)
        elif str(id) == '2':
            gpio.output(22,True)
            time.sleep(6)
            gpio.output(22,False)
        elif str(id) == '3':
            gpio.output(12,True)
            time.sleep(6)
            gpio.output(12,False)
            
    def FiveMinutes(self,id):
        if str(id) == '1':
            gpio.output(32,True)
            time.sleep(6)
            gpio.output(32,False)
        elif str(id) == '2':
            gpio.output(16,True)
            time.sleep(6)
            gpio.output(16,False)
        elif str(id) == '3':
            gpio.output(10,True)
            time.sleep(6)
            gpio.output(10,False)
            
if __name__ == "__main__":
    pass
    
    
    
    
