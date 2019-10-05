# -*- coding: utf-8 -*-

"""
    主页  保持开启状态
"""

from PyQt5 import Qt,QtGui
from PyQt5.QtCore import QTimer
from PyQt5.QtCore import pyqtSlot
from PyQt5.QtWidgets import QWidget,QMessageBox
from OrderPage import Orderpage
from Ui.Ui_Homepage import Ui_Homepage
from Ui.Ui_MainPage import Ui_MainPage
import msgbox
from controls.Connect import ClientStart
import datetime


class HomePage(QWidget, Ui_MainPage):
    """
    Class documentation goes here.
    """
    def __init__(self, parent=None):
        """
        Constructor
        @param parent reference to the parent widget (QWidget)
        """
        super(HomePage, self).__init__(parent)
        self.setupUi(self)
    
        self.order = Orderpage(self)
        self.order.hide()
        self.msgbox = msgbox.msg()
        self.setWindowFlags(Qt.Qt.FramelessWindowHint)
        
        self.timer = QTimer()
        self.timer.start(999)
        self.timer.timeout.connect(self.Oclock)

        self.beatsTimer = QTimer()
        self.beatsTimer.start(3000)
        self.beatsTimer.timeout.connect(self.beats)
        
        self.connect = ClientStart()
        self.connect.start()
        self.order.send_signal.connect(self.connect.Send)
        
        self.ShowerList = []
    
    def beats(self):
        self.connect.Send({
            "heartbeat":"heart"
        })
        self.showerInfoDict = self.connect.showerInfo
        
        
        try:
            for info in self.showerInfoDict:
                if info['status'] == 1:
                    begin_time = info['begin_time']
                    end_time = info['end_time']
                    cell_id = info['cell_id']
                    begin_time = str(begin_time)
                    end_time = str(end_time)
                    cell_id = str(cell_id)
                    self.ShowerList.append(info['nickname']+":"+'20'+begin_time[0:2]+'-'+begin_time[2:4]+'-'+begin_time[4:6]+" "+
                          begin_time[6:8]+':'+begin_time[8:10]+" --- "+'20'+end_time[0:2]+'-'+end_time[2:4]+'-'+end_time[4:6]+" "+
                          end_time[6:8]+':'+end_time[8:10]+"   "+cell_id+'号室')
        
        except Exception as e:
            
            info = eval(self.showerInfoDict)
            
            if info['status'] == 1:
               
                begin_time = info['begin_time']
                end_time = info['end_time']
                cell_id = info['cell_id']
                begin_time = str(begin_time)
                end_time = str(end_time)
                cell_id = str(cell_id)
                
                self.ShowerList.append(info['nickname']+":"+'20'+begin_time[0:2]+'-'+begin_time[2:4]+'-'+begin_time[4:6]+" "+
                    begin_time[6:8]+':'+begin_time[8:10]+" --- "+'20'+end_time[0:2]+'-'+end_time[2:4]+'-'+end_time[4:6]+" "+
                        end_time[6:8]+':'+end_time[8:10]+"   "+cell_id+'号室')
        
       
        try:
            cancel = self.connect.cancelInfo
            b = str(cancel['begin_time'])
            e = str(cancel['end_time'])
            c = str(cancel['cell_id'])
            cancel_info = cancel['nickname']+":"+'20'+b[0:2]+'-'+b[2:4]+'-'+b[4:6]+" "+b[6:8]+':'+b[8:10]+" --- "+'20'+e[0:2]+'-'+e[2:4]+'-'+e[4:6]+" "+e[6:8]+':'+e[8:10]+"   "+c+'号室'
            End_info = End['nickname']+":"+'20'+B[0:2]+'-'+B[2:4]+'-'+B[4:6]+" "+B[6:8]+':'+B[8:10]+" --- "+'20'+E[0:2]+'-'+E[2:4]+'-'+E[4:6]+" "+E[6:8]+':'+E[8:10]+"   "+C+'号室'
                
        except Exception as err:
            pass
        index = self.ShowerList.index
        self.ShowerList = list(set(self.ShowerList)) 
        self.ShowerList.sort(key = index)
        try:
            self.ShowerList.remove(cancel_info)
            
        except:
            pass
        try:
            End = self.connect.EndShowerInfo2
            print("ENd:",End)
            B = str(End['begin_time'])
            E = str(End['end_time'])
            C = str(End['cell_id'])
            End_info = End['nickname']+":"+'20'+B[0:2]+'-'+B[2:4]+'-'+B[4:6]+" "+B[6:8]+':'+B[8:10]+" --- "+'20'+E[0:2]+'-'+E[2:4]+'-'+E[4:6]+" "+E[6:8]+':'+E[8:10]+"   "+C+'号室'
            self.ShowerList.remove(End_info)
        except Exception as error:
            print(error)
        ShowerShowStr = '\n'.join(self.ShowerList)
        self.textBrowser.setText(ShowerShowStr)

       
        
    def msg(self,title,info):
        reply = QMessageBox.information(self,title,info,QMessageBox.Yes)
    
    def Oclock(self):
        nowTime = datetime.datetime.now().strftime('%Y'+'年'+'-%b-%d'+'日'+' %H:%M:%S')
        self.nowTimer.setText(nowTime)
        if self.connect.telOrPswError == True:
            self.msgbox.msginfo.setText('用户名或密码错误')
            self.msgbox.show()
            self.connect.telOrPswError = False
        elif self.connect.user_not_order == True:
            self.msgbox.msginfo.setText('预约时间未到或未预约')
            self.msgbox.show()
            self.connect.user_not_order = False
        elif self.connect.EndMsg == True:
            self.msgbox.msginfo.setText('结束洗浴成功，谢谢使用')
            self.msgbox.show() 
            self.connect.EndMsg = False
        elif self.connect.boxOpneStatus ==True:
            self.msgbox.msginfo.setText('柜门已开')
            self.msgbox.show() 
            self.connect.boxOpneStatus = False
        elif self.connect.startShowerStatus == True:
            self.msgbox.msginfo.setText('身份验证成功,请开始洗浴')
            self.msgbox.show()
            self.connect.startShowerStatus = False
        elif self.connect.msgOrderFaild == True:
            self.msgbox.msginfo.setText('现场预约失败')
            self.msgbox.show()
            self.connect.msgOrderFaild = False
        elif self.connect.msgOrderSuccess == True:
            self.msgbox.msginfo.setText('现场预约成功')
            self.msgbox.show()
            self.connect.msgOrderSuccess = False
    @pyqtSlot()
    def on_use_help_clicked(self):
        self.order.mode = "close_box"
        self.order.needCellId = False
        self.order.show()
        self.order.hidden()
    
        png = QtGui.QPixmap('./qr_code/showeropen.png')
        self.order.qrCode.setPixmap(png)
        """
        Slot documentation goes here.
        """
    @pyqtSlot()
    def on_not_order_clicked(self):
        """
        Slot documentation goes here.
        """
        self.order.mode = "end_shower"
        self.order.needCellId = False
        self.order.show()
        self.order.hidden()
        png = QtGui.QPixmap('./qr_code/showerend.png')
        self.order.qrCode.setPixmap(png)
    @pyqtSlot()
    def on_user_info_clicked(self):
        self.order.mode = "bashou"
        self.order.needCellId = True
        self.order.show()
        self.order.unhidden()
        png = QtGui.QPixmap('./qr_code/showerpromise.png')
        self.order.qrCode.setPixmap(png)
        """
        Slot documentation goes here.
        """
    @pyqtSlot()
    def on_over_order_clicked(self):   
        
        self.order.mode = "over_order"
        self.order.needCellId = False
        self.order.show()
        self.order.hidden() 
        png = QtGui.QPixmap('./qr_code/showerbegin.png')
        self.order.qrCode.setPixmap(png)
    @pyqtSlot()
    def on_over_order_pressed(self):
        self.over_order.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(47, 98, 148);\n"
"left:50px;")
    @pyqtSlot()
    def on_user_info_pressed(self):
        self.user_info.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(47, 98, 148);\n"
"left:50px;")
    @pyqtSlot()
    def on_not_order_pressed(self):
        self.not_order.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(47, 98, 148);\n"
"left:50px;")
    @pyqtSlot()
    def on_use_help_pressed(self):
        self.use_help.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(47, 98, 148);\n"
"left:50px;")
        
        
        
    @pyqtSlot()
    def on_over_order_released(self):
        self.over_order.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(75, 162, 248);\n"
"left:50px;")
    @pyqtSlot()
    def on_over_order_released(self):
        self.over_order.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(75, 162, 248);\n"
"left:50px;")
    @pyqtSlot()
    def on_user_info_released(self):
        self.user_info.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(75, 162, 248);\n"
"left:50px;")
    @pyqtSlot()
    def on_not_order_released(self):
        self.not_order.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(75, 162, 248);\n"
"left:50px;")
    @pyqtSlot()
    def on_use_help_released(self):
        self.use_help.setStyleSheet("color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border: 0px;\n"
"height:80px;\n"
"\n"
"position:absolute;\n"
"background-color:rgb(75, 162, 248);\n"
"left:50px;")
        
if __name__ == "__main__":
    import sys
    from PyQt5.QtWidgets import QApplication
    app = QApplication(sys.argv)
    widget = HomePage()
    widget.show()
    widget.showFullScreen()
    sys.exit(app.exec())
