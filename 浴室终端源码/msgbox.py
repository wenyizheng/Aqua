# -*- coding: utf-8 -*-

"""
Module implementing msg.
"""

from PyQt5.QtCore import pyqtSlot

from Ui.Ui_msgbox import Ui_msg
import sys
from PyQt5.QtWidgets import QDialog,QApplication,QDesktopWidget
from PyQt5.QtCore import Qt,QTimer
import threading

class msg(QDialog, Ui_msg):
    def __init__(self,parent=None):
        """
        @param parent reference to the parent widget (QWidget)
        """
        super(msg, self).__init__(parent)
        self.setupUi(self)
        self.setWindowFlags(Qt.FramelessWindowHint)
        self.msginfo.setText('124545')
        self.center()
        self.timer = QTimer()
        self.timer.start(3000)
        self.timer.timeout.connect(self.timeOutClose)
    def center(self):
        qr = self.frameGeometry()
        cp = QDesktopWidget().availableGeometry().center()
        qr.moveCenter(cp)
        self.move(qr.topLeft())
    def timeOutClose(self):
        self.close()
    @pyqtSlot()
    def on_pushButton_clicked(self):
        """
        Slot documentation goes here.
        """
    
        self.close()
    

if __name__ == '__main__':
    a = msg()
    a.show()
