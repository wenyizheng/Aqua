# -*- coding: utf-8 -*-

"""
        已预约用户界面  子窗体
"""

import datetime

from PyQt5 import Qt
from PyQt5.QtCore import *
from PyQt5.QtWidgets import *
from Ui.Ui_OrderPageMetro import Ui_Orderpage
import config
from PyQt5 import QtGui
class Orderpage(QWidget, Ui_Orderpage):
    """
        已预订用户输入手机号密码进行验证
    """
    #定义一个自定义信号  用于发送tel  user_key.
    
    send_signal = pyqtSignal(dict)
    
    def __init__(self, parent=None):
        """
        Constructor

        @param parent reference to the parent widget (QWidget)
        """
        super(Orderpage, self).__init__(parent)
        self.setupUi(self)
        # self.Send = ClientStart()
        self.mode = "bashou"
        self.inputUserName = []
        self.inputPassWord = []
        self.save = ''
        self.xinghao = ''
        self.tel_enter = True
        self.psw_enter = False
        #self.cellid = None
        self.needCellId = False #pan duan shi fou xu yao cellid xuanze
        
        
    # 输入信息
    def addLabel(self, inf):
        if len(self.inputUserName) < 11 and self.tel_enter == True:
            self.inputUserName.append(inf)
            
            self.textEdit.setText(''.join(self.inputUserName))
        else:
            self.tel_tip.setText("")
            self.psw_enter = True
            self.tel_enter = False
            self.inputPassWord.append(inf)
            if len(self.inputPassWord) == 6:
                self.psw_tip.setText("")
            if len(self.inputPassWord)>6:
                self.inputPassWord.pop()
            #self.textEdit.setText(''.join(self.inputPassWord))
                
            self.textEdit_2.setText('*'*len(self.inputPassWord))

        self.send_info = {
            "type":"showerbegin",
            "tel":"".join(self.inputUserName),
            "user_key":"".join(self.inputPassWord)
        }
        print(self.send_info)

    # 显示时间 按秒刷新
    def onTimerOut(self):
        now = datetime.datetime.now()
        nowTime = str(now.year) + '-' + str(now.month) + '-' + str(now.day) + ' ' + str(now.hour) + ':' + str(
            now.minute) + ':' + str(now.second)
        self.label_3.setText(nowTime)
    #启动程序 从其他页面实例后
    def main(self):
        import sys
        from PyQt5.QtWidgets import QApplication
        app = QApplication(sys.argv)
        dia = Orderpage()
        dia.show()
        sys.exit(app.exec())

    @pyqtSlot()
    def on_num_7_clicked(self):
        """
        Slot documentation goes here.
        """
        # TODO: not implemented yet
        self.addLabel('7')

    @pyqtSlot()
    def on_num_4_clicked(self):
        """
        Slot documentation goes here.
        """
        # TODO: not implemented yetr

        self.addLabel('4')

    @pyqtSlot()
    def on_num_9_clicked(self):
        """
        Slot documentation goes here.
        """
        # TODO: not implemented yet

        self.addLabel('9')

    @pyqtSlot()
    def on_num_5_clicked(self):
        """
        Slot documentation goes here.
        """
        # TODO: not implemented yet

        self.addLabel('5')

    @pyqtSlot()
    def on_num_8_clicked(self):
        """
        Slot documentation goes here.
        """
        # TODO: not implemented yet

        self.addLabel('8')

    @pyqtSlot()
    def on_num_3_clicked(self):
        """
        Slot documentation goes here.
        """
        # TODO: not implemented yet

        self.addLabel('3')

    @pyqtSlot()
    def on_num_1_clicked(self):
        """
        Slot documentation goes here.
        """
        # TODO: not implemented yet

        self.addLabel('1')

    @pyqtSlot()
    def on_num_6_clicked(self):
        """
        Slot documentation goes here.
        """
        # TODO: not implemented yet

        self.addLabel('6')

    @pyqtSlot()
    def on_num_2_clicked(self):
        """
        Slot documentation goes here.
        """
        # TODO: not implemented yet

        self.addLabel('2')

    @pyqtSlot()
    def on_num_0_clicked(self):
        """
        Slot documentation goes here.
        """
        # TODO: not implemented yet

        self.addLabel('0')

    @pyqtSlot()
    def on_num_del_clicked(self):
        """
        Slot documentation goes here.
        """
        # TODO: not implemented yet

        #self.addLabel('del')
        if self.tel_enter == True:
            self.inputUserName.pop()
            self.textEdit.setText(''.join(self.inputUserName))
        if self.psw_enter == True:
            self.inputPassWord.pop()
            self.textEdit_2.setText('*'*len(self.inputPassWord))
    @pyqtSlot()
    def on_textEdit_editingFinished(self):
        self.tel_enter = True
        self.psw_enter = False
    @pyqtSlot()
    def on_textEdit_2_editingFinished(self):
        self.psw_enter = True
        self.tel_enter = False
        print(self.tel_enter)
    
    @pyqtSlot()
    def on_back_clicked(self):
        #隐藏（返回）
        self.psw_tip.setText("")
        self.tel_tip.setText("")
        self.hide()
        #清空已输入信息
        #send_inf['tel'] = ""
        #send_inf['user_key'] = ""
        self.inputUserName = []
        self.inputPassWord = []
        self.textEdit_2.setText("")
        self.textEdit.setText("")

    @pyqtSlot()
    def on_num_send_clicked(self):
        """
        Slot documentation goes here.
        """
        # TODO: not implemented yet
        cellid = None
        err_Type = None
        if (self.cell1.isChecked()):
            cellid = 1
        if (self.cell2.isChecked()):
            cellid = 2
        if (self.cell3.isChecked()):
            cellid = 3
        if (self.cell4.isChecked()):
            cellid = 4
            
        if self.mode == "over_order":
            send_inf = {
            #"type":"cellpromisebind",
            "type":"showerbegin",
            "tel":self.send_info['tel'], #"".join(self.inputUserName),
            "user_key":self.send_info['user_key']
        }
        elif self.mode == "bashou":
            send_inf = {
            "type":"cellpromisebind",
            #"type":"showerbegin",
            "tel":self.send_info['tel'], #"".join(self.inputUserName),
            "user_key":self.send_info['user_key'],
            "cell_id": cellid
        }
        elif self.mode == "close_box":
            send_inf = {
            "type":"boxopen",
            "tel":"".join(self.inputUserName),
            "user_key":"".join(self.inputPassWord)
        }
        elif self.mode == "end_shower":
            send_inf = {
            "type": "showerend",
            "tel": "".join(self.inputUserName),
            "user_key": "".join(self.inputPassWord),
            "block_id":1,
            "room_id":1
        }

        
        #emit 发送信号
        #self.send_signal.emit(self.send_info)
        #发送
        send_promise = False
        #for i in config.team:
         #   if i == send_inf['tel']:
          #      send_promise == True
            
        if len(self.inputUserName) < 11:
            err_type = "手机号长度错误"
            self.tel_tip.setText(err_type)
        elif len(self.inputPassWord) < 6:
            err_type = "密码长度错误"
            self.psw_tip.setText(err_type)
        elif cellid == None and self.needCellId == True:
            err_type = "请选择浴室"
            self.psw_tip.setText(err_type)
        #elif send_inf['tel'] in config.team == False and self.mode == "end_shower":
         #   err_type = "mei kai shi"
          #  self.psw_tip.setText(err_type)
        else:
            self.send_signal.emit(send_inf)
            #config.team.append(send_inf['tel'])
            print(send_inf)
            self.psw_tip.setText("")
            self.tel_tip.setText("")
            self.hide()
        #清空已输入信息
        #send_inf['tel'] = ""
        #send_inf['user_key'] = ""
            self.inputUserName = []
            self.inputPassWord = []
            self.textEdit_2.setText("")
            self.textEdit.setText("")
            self.tel_enter = True
            self.psw_enter = False
        #def QrCode(self,url):
            #url = QUrl(url)
            #self.qrCode.load(url)
    @pyqtSlot()
    def on_num_0_pressed(self):
        self.num_0.setStyleSheet("background-color:rgb(47, 98, 148);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_1_pressed(self):
        self.num_1.setStyleSheet("background-color:rgb(47, 98, 148);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_2_pressed(self):
        self.num_2.setStyleSheet("background-color:rgb(47, 98, 148);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_3_pressed(self):
        self.num_3.setStyleSheet("background-color:rgb(47, 98, 148);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_4_pressed(self):
        self.num_4.setStyleSheet("background-color:rgb(47, 98, 148);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_5_pressed(self):
        self.num_5.setStyleSheet("background-color:rgb(47, 98, 148);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_6_pressed(self):
        self.num_6.setStyleSheet("background-color:rgb(47, 98, 148);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_7_pressed(self):
        self.num_7.setStyleSheet("background-color:rgb(47, 98, 148);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_8_pressed(self):
        self.num_8.setStyleSheet("background-color:rgb(47, 98, 148);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_9_pressed(self):
        self.num_9.setStyleSheet("background-color:rgb(47, 98, 148);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_del_pressed(self):
        self.num_del.setStyleSheet("background-color:rgb(47, 98, 148);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_send_pressed(self):
        self.num_send.setStyleSheet("background-color:rgb(47,98,148);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_back_pressed(self):
        self.back.setStyleSheet("background-color:rgb(47,98,148);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"outline: none;\n"
"border: 0px;\n"
"")
        
        
        
    @pyqtSlot()
    def on_num_del_released(self):
        self.num_del.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_0_released(self):
        self.num_0.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_1_released(self):
        self.num_1.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_2_released(self):
        self.num_2.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_3_released(self):
        self.num_3.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_4_released(self):
        self.num_4.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_5_released(self):
        self.num_5.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_6_released(self):
        self.num_6.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_7_released(self):
        self.num_7.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_8_released(self):
        self.num_8.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_9_released(self):
        self.num_9.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_num_send_released(self):
        self.num_send.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"outline: none;\n"
"border: 0px;\n"
"")
    @pyqtSlot()
    def on_back_released(self):
        self.back.setStyleSheet("background-color:rgb(75, 162, 248);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"outline: none;\n"
"border: 0px;\n"
"")
        
if __name__ == '__main__':
    import sys
    from PyQt5.QtWidgets import QApplication
    app = QApplication(sys.argv)
    dia = Orderpage()
    dia.show()
    sys.exit(app.exec())
